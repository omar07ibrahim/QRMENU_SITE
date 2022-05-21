<?php

namespace Modules\Poscloud\Http\Controllers;

use Akaunting\Money\Money;
use App\Models\CartStorageModel;
use App\Repositories\Orders\OrderRepoGenerator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\SimpleDelivery;
use App\Restorant;
use App\Tables;
use Darryldecode\Cart\CartCollection;
use Carbon\Carbon;
use Cart;
use Akaunting\Module\Facade as Module;
use PDO;

class Main extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
    
        if(auth()->user()){
            if(auth()->user()->restaurant_id==null){
                $this->getRestaurant();
            }
            $vendor=Restorant::findOrFail(auth()->user()->restaurant_id);

            $canDoOrdering =$vendor->getPlanAttribute()['canMakeNewOrder'];
            if(!$canDoOrdering){
                return redirect()->route('orders.index')->withStatus(__('You can not receive more orders. Please subscribe to new plan.'));
            } 
                

            //Associative array for the floor plan
            $floorPlan=[];
            foreach ($vendor->areas as $key => $area) {
                foreach ($area->tables as $table) {
                    $floorPlan[$table->id]=$area->name." - ".$table->name;
                }
            }


            //Change currency
            \App\Services\ConfChanger::switchCurrency($vendor);

            //Create all the time slots
            $timeSlots = $this->getTimieSlots($vendor);


            $deliveryAreas=SimpleDelivery::where('restaurant_id',$vendor->id)->get();
            $deliveryAreasCost=SimpleDelivery::where('restaurant_id',$vendor->id)->pluck('cost','id')->toArray();


            return view('poscloud::index',['deliveryAreasCost'=>$deliveryAreasCost,'deliveryAreas'=>$deliveryAreas,'timeSlots'=>$timeSlots,'vendor'=>$vendor,'restorant'=>$vendor,'floorPlan'=>$floorPlan]);
        }else{
            return redirect(route('login'));
        }
        
    }

    public function moveOrder($tableFrom,$tableTo){
        $order=CartStorageModel::where('vendor_id',auth()->user()->restaurant_id)->where('id',$tableFrom."_cart_items")->first();
        if($order){
            $order->id=$tableTo."_cart_items";
            $order->update();
            return response()->json([
                'status' => true,
                'message'=>__('Order moved successfully')
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message'=>__('Order on this table can not be found')
            ]);
        }
    }

    public function orders(){

        \App\Services\ConfChanger::switchCurrency(Restorant::where('id', auth()->user()->restaurant_id)->first());

        //Get all the active orders
        $orders=CartStorageModel::where('vendor_id',auth()->user()->restaurant_id)->get();


        //Create an array to suit our needs
        $returnArray=[];

        $formatter = new \IntlDateFormatter(config('app.locale'), \IntlDateFormatter::SHORT, \IntlDateFormatter::SHORT);
        $formatter->setPattern(config('settings.datetime_workinghours_display_format_new'));

        foreach ($orders as $key => $order) {

            $theOrder=new CartCollection($order->cart_data);
            $sum = $theOrder->sum(function ($item) {
                return $item->getPriceSum();
            });
            //dd($theOrder);
            $theTable=$order->type==3?Tables::findOrFail($order->id):null;
            if($sum!=0){
                array_push($returnArray,[
                    'id'=>$order->id,
                    'receipt_number'=>$order->receipt_number,
                    'employee'=>$order->user->name,
                    'date'=>$formatter->format($order->created_at),
                    'table'=>$order->type==3?$theTable->restoarea->name."-".$theTable->name:"",
                    'expedition'=>$order->type,
                    'type'=>$order->type==3?__('Dine in'):($order->type==2?__('Takeaway'):__('Delivery')),
                    'total'=> Money($sum, config('settings.cashier_currency'), config('settings.do_convertion'))->format(),
                    'config'=>$order->getAllConfigs()
                ]);
            }else{
                //When order value is 0 - and has no items - remove it
                $order->delete();
            }
            
        }

        return response()->json([
            'status' => true,
            'count' => count($returnArray),
            'orders'=>$returnArray
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('poscloud::create');
    }

    private function toMobileLike(Request $request){
     
        //Find vendor id
        $vendor_id = null;
        foreach (Cart::getContent() as $key => $item) {
            $vendor_id = $item->attributes->restorant_id;
        }
        
        $restorant = Restorant::findOrFail($vendor_id);

        //Organize the item
        $items=[];
        foreach (Cart::getContent() as $key => $item) {
            $extras=[];
            foreach ($item->attributes->extras as $keyExtra => $extra_id) {
                array_push($extras,array('id'=>$extra_id));
            }
            array_push($items,array(
                "id"=>$item->attributes->id,
                "qty"=>$item->quantity,
                "variant"=>$item->attributes->variant,
                "extrasSelected"=>$extras
            ));
        }


        //stripe token
        $stripe_token=null;

        //Custom fields
        $customFields=[];
        if($request->has('custom')){
            $customFields=$request->custom;
        }

        //DELIVERY METHOD
        //Default - dinein - by default
        $delivery_method="dinein";
        if($request->has('expedition')){
            if($request->expedition==1){
                $delivery_method="delivery";
            }else if($request->expedition==2){
                $delivery_method="pickup";
            }
        }
        

        //Table id
        $table_id=null;
        if($request->has('table_id')){
            $table_id=$request->table_id;
        }

         //Phone 
         $phone=null;
         if($request->has('phone')){
             $phone=$request->phone;
         }


        $requestData=[
            'vendor_id'   => $vendor_id,
            'delivery_method'=> $delivery_method,
            'payment_method'=> $request->paymentType,
            'address_id'=>$request->addressID,
            "timeslot"=>$request->timeslot,
            "items"=>$items,
            "comment"=>$request->comment,
            "stripe_token"=>$stripe_token,
            "dinein_table_id"=>$table_id,
            "phone"=>$phone,
            "customFields"=>$customFields,
            "coupon_code"=>$request->has('coupon_code')?$request->coupon_code:null
        ];

        

        return new Request($requestData);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(auth()->user()){
            config(['shopping_cart.storage' => \App\Repositories\CartDBStorageRepository::class]); 
           
            $vendor=Restorant::findOrFail( auth()->user()->restaurant_id);
       
            if(isset($request->session_id)){
                Cart::session($request->session_id);
            }

            //Convert web request to mobile like request
            $mobileLikeRequest=$this->toMobileLike($request);
        

            //Data
            $vendor_id =  $mobileLikeRequest->vendor_id;
            $expedition= $mobileLikeRequest->delivery_method;
            $hasPayment= $request->paymentType=="onlinepayments";
            $isStripe= false;
            $vendorHasOwnPayment=null;

            

            $vendor=Restorant::findOrFail($mobileLikeRequest->vendor_id);

            //Payment methods
            foreach (Module::all() as $key => $module) {
                if($module->get('isPaymentModule')){
                    if($vendor->getConfig($module->get('alias')."_enable","false")=="true"){
                        $vendorHasOwnPayment='all';
                    }
                }
            }

            if($vendorHasOwnPayment==null){
                $hasPayment=false;
            }else{
                //Since v3, don't auto select payment model, show all the  options to  user
                $vendorHasOwnPayment="all";
            }

            //Repo Holder
            $orderRepo=OrderRepoGenerator::makeOrderRepo($vendor_id,$mobileLikeRequest,$expedition,$hasPayment,$isStripe,true, $vendorHasOwnPayment,"POS");

             //Proceed with validating the data
            $validator=$orderRepo->validateData();
            if ($validator->fails()) { 
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()->first(),
                ]);
            }

            //Proceed with making the order
            $validatorOnMaking=$orderRepo->makeOrder();
            if ($validatorOnMaking->fails()) { 
                return response()->json([
                    'status' => false,
                    'message' => $validatorOnMaking->errors()->first(),
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => __('Order finalized'),
                'order'=>$orderRepo->order,
                'id'=>$orderRepo->order->id,
                'paymentLink'=>$orderRepo->paymentRedirect
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => __("Signed out"),
            ]);
     
        }
         
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('poscloud::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('poscloud::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        //Find the table id 
        $cs=CartStorageModel::where('id',$request->table_id."_cart_items")->first();

        if(!$cs){
            return response()->json([
                'status' => false,
                'message' => __('Please add at least one item first'),
            ]);
        }

        //Set config
        $cs->setMultipleConfig($request->all());

        return response()->json([
            'status' => true,
            'message' => __('Order updated'),
            'datas'=>$cs->getAllConfigs()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
