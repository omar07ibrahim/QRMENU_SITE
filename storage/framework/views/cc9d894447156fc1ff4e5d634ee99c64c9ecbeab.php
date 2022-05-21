<?php $__env->startSection('admin_title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!auth()->user()->hasRole('driver')): ?>
        <?php echo $__env->make('layouts.headers.cards.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('layouts.headers.cards.driver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(
        (auth()->user()->hasRole('admin')&&config('app.isft')) ||
        (auth()->user()->hasRole('owner')&&in_array("drivers", config('global.modules',[]))) 
    ): ?>
      
        <div class="container-fluid mt--7 mb-8">
            <div class="row">
                <div class="col-xl-12">
                    <?php echo $__env->make('drivers.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>  
    <?php endif; ?>
    

    <?php if(!auth()->user()->hasRole('driver')): ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1"><?php echo e(__('Overview')); ?></h6>
                                <h2 class="text-white mb-0"><?php echo e(__('Sales value')); ?></h2>
                            </div>

                        </div>
                    </div>
                    <script>
                        var salesValue= <?php echo json_encode($salesValue, 15, 512) ?>;
                        var monthLabels = <?php echo json_encode($monthLabels, 15, 512) ?>;
                        
                        totalOrders=[];
                        salesValues=[];
                        costValues=[];
                        for (const key in salesValue) {

                            totalOrders.push(salesValue[key].totalPerMonth);
                            salesValues.push(salesValue[key].sumValue);
                            if(salesValue[key].costValue){
                                costValues.push(salesValue[key].costValue);
                            }else{
                                costValues.push(0);
                            }
                            }
                        
                        
                        
                    </script>

                    <div class="card-body">
                        <!-- Chart -->
                        <?php if(count($salesValue)>0): ?>
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-sales" class="chart-canvas"></canvas>
                            </div>
                        <?php else: ?>
                            <p class="text-white"><?php echo e(__('No sales right now!')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo e(__('Performance')); ?></h6>
                                <h2 class="mb-0"><?php echo e(__('Total orders')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <?php if(count($salesValue)>0): ?>
                            <div class="chart">
                                <canvas id="chart-orders" class="chart-canvas"></canvas>
                            </div>
                        <?php else: ?>
                            <p><?php echo e(__('No orders right now!')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($doWeHaveExpensesApp): ?>
        <script>
           
            var categoriesLabels = <?php echo json_encode($expenses['last30daysCostPerGroupLabels']); ?>;
            var categoriesValues = <?php echo json_encode($expenses['last30daysCostPerGroupValues']); ?>;

            var vendorsLabels = <?php echo json_encode($expenses['last30daysCostPerVendorLabels']); ?>;
            var vendorsValues = <?php echo json_encode($expenses['last30daysCostPerVendorValues']); ?>;
            
        </script>
        <div class="row mt-5">
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo e(__('Expenses')); ?> ( 30 <?php echo e(__('days')); ?> )</h6>
                                <h2 class="mb-0"><?php echo e(__('By category')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <?php if(count($salesValue)>0): ?>
                            <div class="chart">
                                <canvas id="chart-bycategory" class="chart-canvas"></canvas>
                            </div>
                        <?php else: ?>
                            <p><?php echo e(__('No expenses right now!')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1"><?php echo e(__('Expenses')); ?> ( 30 <?php echo e(__('days')); ?> )</h6>
                                <h2 class="mb-0"><?php echo e(__('By vendor')); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <?php if(count($salesValue)>0): ?>
                            <div class="chart">
                                <canvas id="chart-byvendor" class="chart-canvas"></canvas>
                            </div>
                        <?php else: ?>
                            <p><?php echo e(__('No expenses right now!')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <?php endif; ?>

        <?php if(auth()->user()->hasRole('owner')&&config('settings.enable_pricing')): ?>
            <br /><br />
            <?php echo $__env->make("plans.info",['planAttribute'=> auth()->user()->restorant->getPlanAttribute(),'showLinkToPlans'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        <?php echo $__env->make('layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('topjs'); ?>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('argon')); ?>/vendor/chart.js/dist/Chart.extension.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
  

      

<?php if(
    (auth()->user()->hasRole('admin')&&config('app.isft')) ||
    (auth()->user()->hasRole('owner')&&in_array("drivers", config('global.modules',[]))) 
): ?>

    <!-- Live orders -->
    <script src="<?php echo e(asset('custom')); ?>/js/liveorders.js"></script>

    <!-- Google Map -->
    <script async defer src= "https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&callback=initDriverMap&key=<?php echo config('settings.google_maps_api_key'); ?>"> </script>
      
    <script type="text/javascript">
    var map=null;
    var clientsAndDriverMarkers=[];

    function initDriverMap(){
        map = new google.maps.Map(document.getElementById('map_location'), {center: {lat: 40.7128, lng: -74.006}, zoom: 15 });
        getRestorants();
    }

    function getRestorants(){

        var infowindow = new google.maps.InfoWindow(); 

        const image ="/custom/img/pin_restaurant.svg";

        var bounds = new google.maps.LatLngBounds();

        var link='/restaurantslocations';
        axios.get(link).then(function (response) {
            

            response.data.restaurants.forEach(restaurant => {

                    /**
                     *  Restaurant Marker
                     **/
                     var restoMarker=new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(restaurant.lat), parseFloat(restaurant.lng)),
                        animation: google.maps.Animation.DROP,
                        map,
                        title: restaurant.name,
                        icon:image,
                        color:"red"
                    });

                    restoMarker.addListener("click", () => {
                        var content="<a href=\"/orders?restorant_id="+restaurant.id+"\"><strong>"+restaurant.name+"</strong></a>";
                        infowindow.setContent(content);
                        infowindow.open({
                            anchor: restoMarker,
                            map,
                            shouldFocus: false,
                        });
                    });
                    bounds.extend(restoMarker.position);
            });

            map.fitBounds(bounds);

            getDriverOrders();
            setInterval(() => {
                getDriverOrders();
            }, 20000);
            
        });
    }
   

    function getDriverOrders(){
           
            var infowindow = new google.maps.InfoWindow(); 

            const image ="/custom/img/pin_driver.svg";

            var link='/driverlocations';

           

            for (let i = 0; i < clientsAndDriverMarkers.length; i++) {
                    clientsAndDriverMarkers[i].setMap(null);
                }
                clientsAndDriverMarkers=[];
            

            axios.get(link).then(function (response) {
                

                
                response.data.drivers.forEach(driver => {
                    
                    
                    if(driver.lat!=null){

                        
                         /**
                     *  Driver Marker
                     **/
                    var driverMarker=new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(driver.lat), parseFloat(driver.lng)),
                        map,
                        title: driver.name,
                        icon:image,
                        color:"red"
                    });
                    clientsAndDriverMarkers.push(driverMarker);
                    google.maps.event.addListener(driverMarker, 'click', (function(driverMarker, i) {
                        var content="<a href=\"/orders?driver_id="+driver.id+"\">"+driver.name+"</a>";
                        content+="<br />";
                        content+="Orders: "+driver.driverorders.length;
                        content+="<br />";
                        content+="---------";
                        content+="<br />";
                        driver.driverorders.forEach(order => {
                            content+="Order <a href=\"/orders/"+order.id+"\">#"+order.id+"</a> <a href=\"/orders?restorant_id="+order.restorant_id+"\"><strong>"+order.restorant.name+"</strong></a>";
                            content+="<br />";
                        });
                        content+="---------";
                        content+="<br />";
                        return function() {
                            infowindow.setContent(content);
                            infowindow.open(map, driverMarker);
                        }
                    })(driverMarker, i));
                    

                    /**
                     *  Driver Path
                     **/
                    var driverPathCoordinates=[];
                    driver.paths.forEach(path => {
                        driverPathCoordinates.push({lat: parseFloat(path.lat), lng: parseFloat(path.lng)});
                    });
                    driverPathCoordinates.push({lat: parseFloat(driver.lat), lng: parseFloat(driver.lng)});

                    const driverPath = new google.maps.Polyline({
                        path: driverPathCoordinates,
                        geodesic: true,
                        strokeColor: "#0000FF",
                        strokeOpacity: 1.0,
                        strokeWeight: 2,
                    });
                    driverPath.setMap(map);

                    

                    /**
                     *  Driver orders - if any
                     * */
                     driver.driverorders.forEach(order => {


                        //The restaurant
                        var restaurantMarker=new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(order.restorant.lat), parseFloat(order.restorant.lng)),
                            title: order.restorant.name,
                            color:"red"
                        });
                        bounds.extend(restaurantMarker.position);

                        //The Client
                        var clientMarker=new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(order.address.lat), parseFloat(order.address.lng)),
                            title: order.address.address,
                            map,
                            icon:"/custom/img/pin_client.svg",
                            color:"red"
                        });
                        bounds.extend(clientMarker.position);
                        clientsAndDriverMarkers.push(clientMarker);

                        google.maps.event.addListener(clientMarker, 'click', (function(clientMarker, i) {
                            var content="Order <a href=\"/orders/"+order.id+"\">#"+order.id+"</a> <a href=\"/orders?restorant_id="+order.restorant_id+"\"><strong>"+order.restorant.name+"</strong></a>";
                            content+="<br />Address <a href=\"/orders?client_id="+order.client_id+"\"><strong>"+order.address.address+"</strong></a>";
                               
                            return function() {
                                infowindow.setContent(content);
                                infowindow.open(map, clientMarker);
                            }
                        })(clientMarker, i));


                        var driverPathToClientCoordinates=[];

                        //Create new paths, to indicate, from driver, to restaurant if order is not picked up
                        if(order.laststatus[0].pivot.status_id<6){
                            
                            //Only if this order is not yet picked up
                            var driverPathToRestaurantCoordinates=[];
                            
                            driverPathToRestaurantCoordinates.push({lat: parseFloat(driver.lat), lng: parseFloat(driver.lng)});
                            driverPathToRestaurantCoordinates.push({lat: parseFloat(order.restorant.lat), lng: parseFloat(order.restorant.lng)});
                            driverPathToClientCoordinates.push({lat: parseFloat(order.restorant.lat), lng: parseFloat(order.restorant.lng)});

                            const driverPathToResto = new google.maps.Polyline({
                                path: driverPathToRestaurantCoordinates,
                                geodesic: true,
                                strokeColor: "#FF6000",
                                strokeOpacity: 1.0,
                                strokeWeight: 2,
                            });
                            driverPathToResto.setMap(map);
                        }else{
                            driverPathToClientCoordinates.push({lat: parseFloat(driver.lat), lng: parseFloat(driver.lng)});
                        }

                       
                            
                           //Complete path to client
                            driverPathToClientCoordinates.push({lat: parseFloat(order.address.lat), lng: parseFloat(order.address.lng)});
   
                           const driverPathToClient = new google.maps.Polyline({
                               path: driverPathToClientCoordinates,
                               geodesic: true,
                               strokeColor: "#FF6000",
                               strokeOpacity: 1.0,
                               strokeWeight: 2,
                           });
                           driverPathToClient.setMap(map);
                        });

                    }

                   
                         
                        

                   


                    
                });

              
                

                
                
            })
            .catch(function (error) {
                
            });
    };
   
    </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrahima/qrmenu.site/resources/views/dashboard.blade.php ENDPATH**/ ?>