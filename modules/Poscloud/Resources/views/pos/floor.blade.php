<div class="container-fluid py-2" id="floorTabs">
    <div class="row">
      <div class="col-12 col-xl-12">
        <div class="card h-100">
          <div class="card-body p-3">
            <div class="nav-wrapper position-relative end-0">
                  <div class="tab-content" id="floorTabsContent" >
                    @foreach ($vendor->areas as $key =>$area)
                        <div class="tab-pane fade  {{$key==0?"show active":""}}" id="area-{{ $area->id }}" role="tabpanel" aria-labelledby="area-{{ $area->id }}-tab">
                          <div class="card card-frame" style="text-align: center; justify-content: center; align-items: center;" >
                            <div class="card-body ">
                              <div class="canva " id="canvaHolder">
  
                                @foreach ($area->tables as $table)
                                            <?php
                                          
                                            $whString="";
                                            if($table->w||$table->h){
                                                $whString="width: ".$table->w."px; height: ".$table->h."px;";
                                            }
                                            ?>
                                            <div 
                                            id="drag-{{$table->id}}" 
                                            data-id="{{$table->id}}" 
                                            data-x="{{$table->x}}"
                                            data-y="{{$table->y}}"
                                            data-name="{{$table->name}}"
                                            data-rounded="{{$table->rounded?$table->rounded:"no"}}"
                                            data-size="{{$table->size}}"
                                            class="resize-drag {{ $table->rounded=="yes"?"circle":""}}" style="transform: translate({{$table->x}}px, {{$table->y}}px); {{$whString}}" >
                                                <p> {{$table->name}} </p>
                                                <span>{{$table->size}}</span>
                                            </div>
                                        @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach
                  </div>
           
    </div>
  </div>
  </div>
      </div>
  </div>
  </div>