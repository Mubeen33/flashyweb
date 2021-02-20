<div>
    <div class="ps-table--shopping-cart" >

        {{--        <h1 x-text="$wire.type"></h1>--}}
        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <div class="ps-form__decs">
                        <div class="ps-radio">
                            <input  type="radio" id="personal-address" wire:model="type" name="address"  value="Personal">

                            <label for="personal-address">Personal Address
                                {{--                                <span x-text="address">--}}

                                {{--                                   </span>--}}
                            </label>

                        </div>
                    </div>
                    @error('type') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <div class="ps-form__decs">
                        <div class="ps-radio">
                            <input  type="radio" id="business-address" name="address" wire:model="type"  value="Business">
                            <label for="business-address">Business Address</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <figure >

            {{--               <div class="ps-form__decs">--}}
            {{--                   <div class="ps-radio">--}}
            {{--                       <input class="form-control" type="radio" id="user-type-1" name="user-type">--}}
            {{--                       <label for="user-type-1"></label>--}}
            {{--                   </div>--}}
            {{--               </div>--}}

            {{--                                                        <div class="form-group">--}}

            {{--                                                            <select class="ps-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">--}}
            {{--                                                                <option value="1" data-select2-id="3">Personal</option>--}}
            {{--                                                                <option value="2" data-select2-id="6">Italia</option>--}}
            {{--                                                                <option value="3" data-select2-id="7">Vietnam</option>--}}
            {{--                                                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 120px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-0lc4-container"><span class="select2-selection__rendered" id="select2-0lc4-container" role="textbox" aria-readonly="true" title="Italia">Italia</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
            {{--                                                        </div>--}}
            <div class="form-group">
                <lable class="p-2"> Recipient Name </lable>
                <input class="form-control  @error('recipient_name') border-danger @enderror"
                       type="text"
                       wire:model="recipient_name"
                       placeholder="Recipient Name">
                @error('recipient_name') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2"> Recipient Mobile Number </lable>
                <input
                    class="form-control @error('recipient_phone_no') border-danger @enderror"
                    type="number"
                    wire:model="recipient_phone_no"
                    placeholder="Recipient Mobile Number">
                @error('recipient_phone_no') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <lable class="p-2"> Street Address </lable>
                <input
                    class="form-control @error('street_address') border-danger @enderror"
                    type="text"
                    wire:model="street_address"
                    placeholder="Street Address">
                @error('street_address') <span class="error-text">{{ $message }}</span> @enderror
            </div>





            <div class="form-group" x-show="$wire.type">
                {{--            <div class="form-group" x-show="false">--}}
                <lable class="p-2"> Business Name </lable>
                <input
                    class="form-control @error('business_name') border-danger @enderror"
                    type="text"
                    wire:model="business_name"
                    placeholder="Business Name">
                @error('business_name') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <lable class="p-2"> Complex/Building </lable>
                <input
                    class="form-control @error('building_complex') border-danger @enderror"
                    type="text"
                    wire:model="building_complex"
                    placeholder="Complex/Building (Optional)">
                @error('building_complex') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <lable class="p-2"> Suburb </lable>
                <input
                    class="form-control @error('suburb') border-danger @enderror"
                    type="text"
                    wire:model="suburb"
                    placeholder="Suburb">
                @error('suburb') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable class="p-2"> City/Town </lable>
                <input
                    class="form-control @error('city_town') border-danger @enderror"
                    type="text"
                    wire:model="city_town"
                    placeholder="City/Town">
                @error('city_town') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2">Province</lable>
                <input
                    class="form-control @error('province') border-danger @enderror"
                    type="text"
                    wire:model="province"
                    placeholder="Province">
                @error('province') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2">Postal Code</lable>
                <input
                    class="form-control @error('postal_code') border-danger @enderror"
                    type="text"
                    wire:model="postal_code"
                    placeholder="Postal Code">
                @error('postal_code') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"></div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"></div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="mb-5 float-right">
{{--                        <h1 x-text="$wire.get('action')"></h1>--}}
                        <button class="ps-btn-cancel ps-btn-cancel--sm" @click="updateComponent('address')">Cancel</button>
                        <button class="ps-btn ps-btn--sm" wire:click="createAddress()">Create</button>

                            <button   class="ps-btn ps-btn--sm" wire:click="updateAddress('{{$address_id}}')">Update</button>


                    </div>
                </div>
            </div>
            {{--               <div class="row">--}}
            {{--                   <div class="col-9"></div>--}}
            {{--                   <div class="col-3">--}}
            {{--                       <div class="form-group float-right">--}}
            {{--                           <button class="ps-btn-cancel ps-btn-cancel--sm" @click="updateComponent('address')">Cancel</button>--}}
            {{--                           <button class="ps-btn ps-btn--sm" @click="updateComponent('address')">Create</button>--}}
            {{--                       </div>--}}
            {{--                   </div>--}}
            {{--               </div>--}}
        </figure>
    </div>
    {{--    @include('.livewire/add-to-cart/footer',['action'=>'payment'])--}}
</div>
