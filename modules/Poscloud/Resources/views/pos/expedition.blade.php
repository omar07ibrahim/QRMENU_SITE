<div class="card card-profile shadow mt-3 mb-3" id="expedition">
  
    <div class="px-4">
      
      <div class="card-content ">
        <br />

        <label>{{ __('Client name') }}</label>
        <div class="input-group mb-3">
            <input :value="config.client_name"  type="text" id="client_name" class="form-control" placeholder="{{ __('Client name') }}" aria-label="o" autofocus>
        </div>

        <label>{{ __('Client phone') }}</label>
        <div class="input-group mb-3">
            <input  :value="config.client_phone" type="text" id="client_phone"  class="form-control" placeholder="{{ __('Client phone') }}" aria-label="phone">
        </div>

       
        
        <label>{{ __('Time') }}</label><br />
        <div class="input-group mb-3">
          <select name="timeslot" id="timeslot" class="form-control{{ $errors->has('timeslot') ? ' is-invalid' : '' }}" required>
            @foreach ($timeSlots as $value => $text)
                <option value={{ $value }}>{{$text}}</option>
            @endforeach
          </select>
        </div>

        <div id="client_address_fields">
          <label>{{ __('Client address') }}</label>
          <div class="input-group mb-3">
           
              <input :value="config.client_address" type="text" id="client_address" class="form-control" placeholder="{{ __('Client address') }}">
          </div>
  
          <label>{{ __('Delivery area') }}</label>
          <div class="input-group mb-3">
            <select name="delivery_area" id="delivery_area" class="form-control{{ $errors->has('deliveryAreas') ? ' is-invalid' : '' }}" >
              <option  value="0">{{__('Select delivery area')}}</option>
              @foreach ($deliveryAreas as $simplearea)
                  <option  value={{ $simplearea->id }}>{{$simplearea->getPriceFormated()}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="input-group mb-3">
          <button onclick="updateExpeditionPOS()" class="btn btn-primary">{{__('Save')}}</button>
        </div>

       

      </div>
    </div>

</div>