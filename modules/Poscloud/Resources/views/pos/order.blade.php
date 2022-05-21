@include('restorants.partials.modals')
@include('poscloud::pos.modals')
<?php

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
?>
<div style="display: none" class="container-fluid py-2" id="orderDetails" >
   
    <div class="row" style="height: calc(100vh - 110px);" >
        <div class="col-sm-4 d-inline-block" style="background-color:#e9ecef; height:100%; overflow:auto;">
            @include('poscloud::pos.cartSideMenu')
        </div>
        <div id="start" class="col-sm-8 d-inline-block" style="height:100%;">
        
            <!-- Navbar Dark -->
                <div class="mt--3  navbar-expand-lg navbar-dark bg-gradient-dark z-index-3 py-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-8">
                                <div class="field mt--3">
                                
                                    <select class="select2init noselecttwo" id="itemsSelect" placeholder="{{ __('Search for item') }}">
                                        <option></option>
                                        @if(!$restorant->categories->isEmpty())
                                        @foreach ( $restorant->categories as $key => $category)
                                                @if(!$category->items->isEmpty())
                                                    <optgroup label="{{$category->name}}" >
                                                        @foreach ($category->aitems as $item)
                                                        <option value="{{$item->id}}" >{{$item->name}}</option>
                                                        @endforeach
                                                        
                                                        
                                                    </optgroup>
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                        
                                        
                                    </select>
                                
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#modalCategories">{{ __('Categories')}}</button> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            <!-- End Navbar -->

            <div class="row mt-3 px-5" style="height:90%; overflow:auto;">
                @if(!$vendor->categories->isEmpty())
                    
                    @foreach ( $vendor->categories as $key => $category)
                        @if(!$category->aitems->isEmpty())
                            
                            <div class="mt-4" id="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}" class="{{ clean(str_replace(' ', '', strtolower($category->name)).strval($key)) }}">
                                <h1>{{ $category->name }}</h1>
                            </div>
                        @endif
                    

                    @foreach ($category->aitems as $item)
                        <div  onClick="setCurrentItem({{ $item->id }})" class="col-xl-3 col-md-6 mb-3 mt-3">
                            <div class="card">
                            <div class="position-relative">
                                <a class="d-block shadow-xl border-radius-xl">
                                <img src="{{ $item->logom }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body px-2 pb-1">
                                <span class="badge bg-gradient-light">@money($item->price, config('settings.cashier_currency'),config('settings.do_convertion'))</span><br />
                                <strong  class="text-dark mb-2 text">{{ $item->name }}</strong>
                                
                            </div>
                            </div>
                        </div>
                    @endforeach
                    @endforeach
                @endif
                
                
            </div>

        </div>
    </div>
  </div>

@section('js')
    <script src="{{ asset('custom') }}/js/order.js"></script>
    @include('restorants.phporderinterface') 
@endsection