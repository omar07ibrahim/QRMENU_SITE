<?php

namespace Modules\Webhooks\Listeners;

class WebhookOrder
{

    private function notify($order,$webhook){
        $client = new \GuzzleHttp\Client();

        $payload = [
            'form_params' => $order->toArray(),
        ];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $webhook, $payload);
    }


    public function handleOrderAcceptedByAdmin($event){

       

        $order=$event->order;
        $vendor=$order->restorant;

        //Vendor setup
        $webhook_for_vendor=$vendor->getConfig('webhook_url_by_admin','');

        //Admin setup
        $webhook_for_admin=config('webhook.webhook_by_admin');

        //Notify Admin
        if(strlen($webhook_for_admin)>5){
            $this->notify($order,$webhook_for_admin);
        }
        

        //Notify Owner
        if(strlen($webhook_for_vendor)>5){
            $this->notify($order,$webhook_for_vendor);
        }
        
    }

    public function handleOrderAcceptedByVendor($event){
        
      
        $order=$event->order;
        $vendor=$order->restorant;

        //Vendor setup
        $webhook_for_vendor=$vendor->getConfig('webhook_url_by_vendor','');

        //Admin setup
        $webhook_for_admin=config('webhook.webhook_by_vendor');

        //Notify Admin
        if(strlen($webhook_for_admin)>5){
            $this->notify($order,$webhook_for_admin);
        }
        

        //Notify Owner
        if(strlen($webhook_for_vendor)>5){
            $this->notify($order,$webhook_for_vendor);
        }
    }

    public function handleNewVendor($event){
        $user=$event->user;
        $vendor=$event->vendor;

         //Admin setup
         $webhook_for_admin=config('webhook.webhook_new_vendor');

          //Notify Admin
        if(strlen($webhook_for_admin)>5){
            $client = new \GuzzleHttp\Client();

            $payload = [
                'form_params' =>[
                    'user'=>$user->toArray(),
                    'vendor'=>$vendor->toArray()
                ],
            ];

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $webhook_for_admin, $payload);
        }
 
    }


    public function subscribe($events)
        {
            $events->listen(
                'App\Events\OrderAcceptedByAdmin',
                [WebhookOrder::class, 'handleOrderAcceptedByAdmin']
            );

            $events->listen(
                'App\Events\OrderAcceptedByVendor',
                [WebhookOrder::class, 'handleOrderAcceptedByVendor']
            );

            $events->listen(
                'App\Events\NewVendor',
                [WebhookOrder::class, 'handleNewVendor']
            );
        }
}

?>