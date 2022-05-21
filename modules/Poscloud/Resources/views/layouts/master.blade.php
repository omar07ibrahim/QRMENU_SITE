<!--
=========================================================
* Soft UI Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/black-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('softd') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('softd') }}/img/favicon.png">
  <title>
    {{ $vendor->name." - ".config('app.name')}}
  </title>
  <!--     Fonts and icons     -->
  <link href="{{ asset('css') }}/gfonts.css" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="{{ asset('softd') }}/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('softd') }}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="{{ asset('vendor') }}/fa/fa.js" crossorigin="anonymous"></script>
  <link href="{{ asset('softd') }}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('softd') }}/css/soft-ui-dashboard.css?v=1.0.1" rel="stylesheet" />

  <!-- Select2  -->
  <link type="text/css" href="{{ asset('custom') }}/css/select2.min.css" rel="stylesheet">

  <!--Custom CSS -->
  <link type="text/css" href="{{ asset('custom') }}/css/custom.css" rel="stylesheet">

  <link type="text/css" href="{{ asset('custom') }}/css/pos.css" rel="stylesheet">
  
  @laravelPWA

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100">
    @include('poscloud::navbar')
      <div class="nav-wrapper position-relative end-0 mt-2" id="floorAreas">
        <ul class="nav nav-pills nav-fill p-1 bg-transparent " role="tablist">
          @foreach ($vendor->areas as $key =>$area)
            <li class="nav-item" style="padding-top:8px" >
              <a style="height: 50px;"  class="nav-link mb-0 px-0 py-1 {{$key==0?"active":""}}" id="area-{{ $area->id }}-tab"  data-bs-toggle="tab" data-bs-target="#area-{{ $area->id }}" type="button" role="tab" aria-controls="area-{{ $area->id }}" aria-selected="{{$key==0?"tru":"false"}}"><strong>{{ $area->name }}</strong></a>
            </li>
          @endforeach
        </ul>
      </div>
      @yield('floorPlan')
      @yield('orders')
      @yield('orderDetails')  
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('softd') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('softd') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('softd') }}/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('softd') }}/js/soft-ui-dashboard.min.js?v=1.0.1"></script>

  <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

  <!-- Import Vue -->
  <script src="{{ asset('vendor') }}/vue/vue.js"></script>
  <!-- Import AXIOS --->
  <script src="{{ asset('vendor') }}/axios/axios.min.js"></script>

  <!-- Import Interact --->
  <script src="{{ asset('vendor') }}/interact/interact.min.js"></script>
  
  <!-- Import Select2 --->
  <script src="{{ asset('vendor') }}/select2/select2.min.js"></script>

  <!-- printThis -->
  <script src="{{ asset('vendor') }}/printthis/printThis.js"></script> 



   <!-- Add to Cart   -->
   <script>
      var LOCALE="<?php echo  App::getLocale() ?>";
      var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
      var USER_ID = '{{  auth()->user()&&auth()->user()?auth()->user()->id:"" }}';
      var PUSHER_APP_KEY = "{{ config('broadcasting.connections.pusher.key') }}";
      var PUSHER_APP_CLUSTER = "{{ config('broadcasting.connections.pusher.options.cluster') }}";
      var CASHIER_CURRENCY = "<?php echo  config('settings.cashier_currency') ?>";
      var LOCALE="<?php echo  App::getLocale() ?>";
      var SELECT_OR_ENTER_STRING="{{ __('Select, or enter keywords to search items') }}";
      var DELIVERY_AREAS = @json($deliveryAreasCost, JSON_PRETTY_PRINT);
      var IS_POS=true;
      var CURRENT_TABLE_ID=null;
      var EXPEDITION=3;
      var CURRENT_TABLE_NAME=null;
      var CURRENT_RECEIPT_NUMBER="";
      var SHOWN_NOW="floor"; //floor,orders,order
      var floorPlan=@json($floorPlan);

      // "Global" flag to indicate whether the select2 control is oedropped down).
      var _selectIsOpen = false;

      
   </script>
   <script src="{{ asset('custom') }}/js/cartPOSFunctions.js"></script>
   
   <!-- Cart custom sidemenu -->
   <script src="{{ asset('custom') }}/js/cartSideMenu.js"></script>

   <!-- All in one -->
   <script src="{{ asset('custom') }}/js/js.js?id={{ config('config.version')}}"></script>

   <!-- Notify JS -->
   <script src="{{ asset('custom') }}/js/notify.min.js"></script>


  @stack('js')
  @yield('js')

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

  </script>


  <script type="text/javascript">

      $(function() {

        $('#printPos').on("click", function () {
          $("#posRecipt").printThis(); 
        });

        //INterval getting orders
        setInterval(() => {
          getAllOrders();

        }, 12000);


        $('#orderTo').select2({
            dropdownParent: $('#modalSwitchTables')
        });
        $('#orderFrom').select2({
            dropdownParent: $('#modalSwitchTables')
        });
        $('#swithTableButton').on('click',function(e){
          $('#modalSwitchTables').modal('hide');
          doMoveOrder($('#orderFrom').val(),$('#orderTo').val());
        })

      
        $('.select2init').select2({
          id:"-1",
          placeholder:"Search ..."
        });

        $('select').on('change', function() {
          if(this.id=="itemsSelect"&&this.value!=""){
            setCurrentItem( this.value );
          }
          
        });


        // Initialize the select2.
      const $mySelect = $("#itemsSelect");
      $mySelect.select2({
        placeholder: { 
          id: "",
          text: SELECT_OR_ENTER_STRING
        }, 
        selectOnClose: true,
      });

      $mySelect
        .on("select2:open", event => {
          _selectIsOpen = true;
        })
        .on("select2:close", event => {
          _selectIsOpen = false;
        })
        .on("select2:select", (event) => {});

        $("body")
        .on("select2:opening", event => {})
        
        .on("keypress", event => {
          if ($(event.target).is('input, textarea, select')) return;
          if (_selectIsOpen) {
            return;
          }
          if(SHOWN_NOW!="order"){
            //But first check if in order
            return;
          }


          if (event.keyCode === 13) {
              if($('#addToCart1').is(":visible")) {
                addToCartVUE();
              }
              return;
            }
          const charCode = event.which;
          if (
            !(event.altKey || event.ctrlKey || event.metaKey) &&
            ((charCode >= 48 && charCode <= 57) ||
              (charCode >= 65 && charCode <= 90) ||
              (charCode >= 97 && charCode <= 122))
          ) {
            $mySelect.select2("open");
            $("input.select2-search__field")
              .eq(0)
              .val(String.fromCharCode(charCode));
          }
        });


        //Get all order - vue
        getAllOrders();

        $('#orderList .orderRow').hover(function() {
                  $(this).addClass('hoverTableRow');
            }, function() {
                $(this).removeClass('hoverTableRow');
        });

        $('#orderList tr').on( "click", function() {
          var id=$( this ).attr('id');
        });
      })

    
  

    function showOrders() {
     
      $("#floorTabs").hide();
      $("#floorAreas").hide();
      $("#orders").show();
      $("#orderDetails").hide();
      SHOWN_NOW="orders";
    }

    function showOrderDetail(id) {
     
     $("#floorTabs").hide();
     $("#floorAreas").hide();
     $("#orders").hide();
     $("#orderDetails").show();

     //Set the name of the table
     $("#tableName").html(CURRENT_TABLE_NAME);
     $("#orderNumber").html(CURRENT_RECEIPT_NUMBER);

     EXPEDITION==1?$('#client_address_fields').show():$('#client_address_fields').hide(); 
     EXPEDITION==3?$('#expedition').hide():$('#expedition').show();


     SHOWN_NOW="order";

     clearDeduct();
     $('#coupon_code').html("");
   }


   function moveOrder(){
    //Find Occupied
    //Find Free tables
    var occupiedList={};
    var freeList={};
    $('.resize-drag').each(function(i, obj) {
        var id=obj.id.replace("drag-","");
        if($("#"+obj.id).hasClass('occcupied')){
          occupiedList[id]=floorPlan[id];
        }else{
          freeList[id]=floorPlan[id];
        }
    });
    
    
    //If occupied or free is empty, show a message
    if(Object.keys(occupiedList).length==0){
      js.notify("There are no active orders on tables", "warning");
    }else if(Object.keys(freeList).length==0){
      js.notify("There are no free tables", "warning");
    }else{

      //Set selects
      $('#orderFrom').empty();
      $('#orderTo').empty();
      Object.keys(occupiedList).map((key)=>{
        var newOption = new Option(occupiedList[key], key, false, false);
        $('#orderFrom').append(newOption);//.trigger('change');
      })
      Object.keys(freeList).map((key)=>{
        var newOption = new Option(freeList[key], key, false, false);
        $('#orderTo').append(newOption);//.trigger('change');
      })
      $('#orderFrom').trigger("change");
      $('#orderTo').trigger("change");
     

      //Switch Tables modal
      $('#modalSwitchTables').modal('show');
    }

    

    


    //Open the modal
   }

   function createDeliveryOrder() {
      CURRENT_TABLE_ID= 1+""+(new Date().getTime()+"").substring(6)
      CURRENT_TABLE_NAME="New delivery order";
      EXPEDITION=1;
      expedition.config={};
      getCartContentAndTotalPrice();
      showOrderDetail(CURRENT_TABLE_ID);
   }

   function createPickupOrder() { 
      CURRENT_TABLE_ID= (new Date().getTime()+"").substring(6)
      CURRENT_TABLE_NAME="New takeaway order";
      EXPEDITION=2;
      expedition.config={};
      getCartContentAndTotalPrice();
      showOrderDetail(CURRENT_TABLE_ID);

    }


    function showFloor() {

      $("#floorTabs").show();
      $("#floorAreas").show();
      $("#orders").hide();
      $("#orderDetails").hide();
      SHOWN_NOW="floor";
    }

    function openTable(id,receipt_number) {

      CURRENT_TABLE_ID=id;
      CURRENT_RECEIPT_NUMBER=receipt_number;
      idLength=(id+"").length;
      if(idLength<6){
        CURRENT_TABLE_NAME=floorPlan[id];
        EXPEDITION=3;
      }else if(idLength==7){
        CURRENT_TABLE_NAME="Takeaway order";
        EXPEDITION=2;
      }else{
        CURRENT_TABLE_NAME="Delivery order";
        EXPEDITION=1;
      }
      
      getCartContentAndTotalPrice();
      showOrderDetail(id);
    }

    function makeOcccupied(id){
      $('#drag-'+id).addClass('occcupied');
    }

    function makeFree(){
      $('.occcupied').removeClass('occcupied');
    }
  </script>

  <script type="module">
    interact('.resize-drag')
    .on('tap', function (event) {

      //The drag id
      var dragid=event.currentTarget.id;
      var id=dragid.replace('drag-',"");
      openTable(id,"");
      event.preventDefault()
    });
    </script>

    
     

</body>

</html>