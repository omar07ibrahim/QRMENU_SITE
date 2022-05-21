<div id="c" class="mt-4">
    <div class="offcanvas-menu-inner">
        <div class="minicart-content">
            <div class=" minicart-heading ">
                <span id="orderNumber"></span>
                    <h4 id="tableName"></h4>

                </div>
            
            
     

            
            <!-- Order -->
            <div class="searchable-container">
                <div id="cartList">
                    <ul class="list-group items" v-for="item in items">
                        
                        <li v-cloak class="list-group-item border-0 d-flex p-2 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="mb-3 text-sm">@{{ item.name }}</h6>
                              <span class="mb-2 text-xs">{{ __('Price') }}: <span class="text-dark font-weight-bold ms-2">@{{ item.attributes.friendly_price }}</span></span>
                              <span class="mb-2 text-xs">{{ __('QTY') }}: <span class="text-dark ms-2 font-weight-bold">@{{ item.quantity }}</span></span>
                            </div>
                            <div class="ms-auto">
                               
                                <button v-if="item.quantity==1" type="button" v-on:click="remove(item.id)"  :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-trash"></i></span>
                                </button>
                                <button v-if="item.quantity!=1" type="button" v-on:click="decQuantity(item.id)" :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-minus"></i></span>
                                </button>
                                <button type="button" v-on:click="incQuantity(item.id)" :value="item.id" class="btn btn-outline-primary btn-icon btn-sm page-link btn-cart-radius">
                                    <span class="btn-inner--icon btn-cart-icon"><i class="fa fa-plus"></i></span>
                                </button>
                                
                            



                            </div>
                          </li>
                        
                        
                        
                      </ul>
                </div>
                    
                
            </div>

            
            
            <!-- Client Card -->
            @include('poscloud::pos.expedition')
            <!-- End client cart -->

            <br />

            <div id="totalPrices" v-cloak>
                <div  class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span v-if="totalPrice==0">{{ __('Cart is empty') }}!</span>
                                <span v-if="totalPrice"><strong>{{ __('Subtotal') }}:</strong></span>
                                <span v-if="totalPrice" class="ammount"><strong>@{{ totalPriceFormat }}</strong></span>
                            </div>
                        </div>

                        <div class="row" v-if="delivery">
                            <div class="col">
                                <span v-if="totalPrice"><strong>{{ __('Delivery') }}:</strong></span>
                                <span v-if="totalPrice" class="ammount"><strong>@{{ deliveryPriceFormated }}</strong></span>
                            </div>
                        </div>
                        <div class="row" v-if="deduct">
                            <div class="col">
                                <span v-if="deduct"><strong>{{ __('Applied discount') }}:</strong></span>
                                <span v-if="deduct" class="ammount"><strong>@{{ deductFormat }}</strong></span>
                            </div>
                        </div>
                    </div>

                    <div v-if="totalPrice" v-cloak class="card-body">
                        <div class="row">
                            <div class="col">
                                <span v-if="totalPrice"><strong>{{ __('Total') }}:</strong></span>
                                <span v-if="totalPrice" class="ammount"><strong>@{{ withDeliveryFormat }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                
                
                <div v-if="totalPrice" v-cloak>
                    <div v-if="totalPrice" v-cloak>

                        @if(in_array("coupons", config('global.modules',[])))
                            <!-- Coupon CODE -->
                            <div  class="card card-stats p-2 mb-0">
                                <div  class="row mt-3">
                                    <div class="col-md-7">
                                        <input  id="coupon_code" name="coupon_code" type="text" class="form-control form-control-alternative" placeholder="{{ __('Discount coupon')}}">
                                    </div>
                                    <div class="col-md-5">
                                        <button onclick="applyDiscount()" id="promo_code_btn" type="button" class="btn btn-outline-primary w-100">{{ __('Apply') }}</button>
                                        <span><i id="promo_code_succ" class="ni ni-check-bold text-success"></i></span>
                                        <span><i id="promo_code_war" class="ni ni-fat-remove text-danger"></i></span>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <!-- End Cooupo Code -->
                        @endif

                        <button id='dineincheckout' type="button" class="btn btn-lg w-100 btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modalPayment">{{ __('Checkout') }}</button>
                    </div>
                </div>

                
            
               
            </div>
        </div>
    </div>
</div>
