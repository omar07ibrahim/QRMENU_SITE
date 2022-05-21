<div style="display: none" class="container-fluid py-2" id="orders" >
    <div class="row">
      <div class="col-12 col-xl-12 mt-3">
        <div class="card">
           
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-7">
                <h6>{{__('Orders')}}</h6>
              </div>
              <div class="col-lg-6 col-md-12 my-auto text-end">
                <a href="#" onclick="createPickupOrder()" class="btn bg-gradient-primary active" role="button" aria-pressed="true">
                  <span class="btn-inner--icon"><i class="ni ni-pin-3"></i></span>
                  <span class="btn-inner--text d-none d-sm-inline-block">{{ __('New takeaway order') }}</span>
                </a>
                <a href="#" onclick="createDeliveryOrder()" class="btn bg-gradient-primary active" role="button" aria-pressed="true">
                  <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
                  <span class="btn-inner--text d-none d-sm-inline-block">{{ __('New delivery order') }}</span>
                </a>
                <a href="#" onclick="moveOrder()" class="btn bg-gradient-default active" role="button" aria-pressed="true">
                  <span class="btn-inner--icon"><i class="ni ni-ui-04"></i></span>
                  <span class="btn-inner--text d-none d-sm-inline-block">{{ __('Move order') }}</span>
                </a>
              </div>
            </div>
          </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="orderList">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Date') }}</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2  d-none d-md-table-cell">{{ __('Recipt number') }}</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Order type') }}</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7   d-none d-md-table-cell ">{{ __('Employee') }}</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  d-none d-md-table-cell ">{{ __('Total') }}</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Table/Client') }}</th>
                  
                  </tr>
                </thead>
                <tbody id="orderList"  v-for="item in items">
                 
                    <tr v-cloak class="mt-3 orderRow" v-on:click="openDetails(item.id,item.receipt_number)"  v-bind:id="item.id">
                        <td class="">
                            <span class="text-secondary text-xs font-weight-bold">@{{ item.date }}</span>
                        </td>
                        <td class="  d-none d-md-table-cell">
                          <p class="text-xs font-weight-bold mb-0 reciptNumber">@{{ item.receipt_number }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">@{{ item.type }}</p>
                        </td>
                        <td class="align-middle text-center   d-none d-md-table-cell">
                          <span class="text-secondary text-xs font-weight-bold">@{{ item.employee }}</span>
                        </td>
                        <td class="align-middle text-center   d-none d-md-table-cell">
                            <span class="text-secondary text-xs font-weight-bold">@{{ item.total }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span v-if="item.expedition==3" class="text-secondary text-xs font-weight-bold">@{{ item.table }}</span>
                            <span v-if="item.config&&item.config.client_name" class="text-secondary text-xs font-weight-bold">@{{ item.config.client_name }}</span>
                          </td>
                        
                      </tr>
                   
                  

                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>