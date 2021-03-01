<div>
    <div class="ps-table--shopping-cart" x-data>

        {{--        <h1 x-text="$wire.type"></h1>--}}
        <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <div class="ps-form__decs">
                        <div class="ps-radio">
                            <input  type="radio" id="personal-address" wire:model="type" name="address"  value="Personal">

                            <label for="personal-address">
                                <b>
                                    Personal Address
                                </b>
                                {{--                                <span x-text="address">--}}

                                {{--                                   </span>--}}
                            </label>
{{--                            <h1 x-text="$wire.address_id"></h1>--}}

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
                            <label for="business-address"><b>Business Address</b></label>
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
                <lable class="p-2">
                    <b>
                        Recipient Name
                    </b>
                </lable>
                <input class="form-control  @error('recipient_name') border-danger @enderror"
                       type="text"
                       wire:model="recipient_name"
                       placeholder="Recipient Name">
                @error('recipient_name') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2"> <b>Mobile Number</b> </lable>
                <input
                    class="form-control @error('recipient_phone_no') border-danger @enderror"
                    type="number"
                    wire:model="recipient_phone_no"
                    placeholder="Recipient Mobile Number">
                @error('recipient_phone_no') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <lable class="p-2">
                    <b>
                        Street Address
                    </b>
                </lable>
                <input
                    class="form-control @error('street_address') border-danger @enderror"
                    type="text"
                    wire:model="street_address"
                    placeholder="Street Address">
                @error('street_address') <span class="error-text">{{ $message }}</span> @enderror
            </div>





            <template  x-if="$wire.type=='Business'">
                <div class="form-group">
                    <lable class="p-2">
                        <b>
                            Business Name
                        </b>
                    </lable>
                    <input
                        class="form-control @error('business_name') border-danger @enderror"
                        type="text"
                        wire:model="business_name"
                        placeholder="Business Name">
                    @error('business_name') <span class="error-text">{{ $message }}</span> @enderror
                </div>
            </template>


            <div class="form-group">
                <lable class="p-2">
                    <b>
                        Complex/Building
                    </b>
                </lable>
                <input
                    class="form-control @error('building_complex') border-danger @enderror"
                    type="text"
                    wire:model="building_complex"
                    placeholder="Complex/Building (Optional)">
                @error('building_complex') <span class="error-text">{{ $message }}</span> @enderror

            </div>

            <div class="form-group">
                <lable class="p-2">
                    <b>
                        Suburb
                    </b>
                </lable>
                <input
                    class="form-control @error('suburb') border-danger @enderror"
                    type="text"
                    wire:model="suburb"
                    placeholder="Suburb">
                @error('suburb') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <lable class="p-2">
                    <b>
                        City/Town
                    </b>
                </lable>
                <input
                    class="form-control @error('city_town') border-danger @enderror"
                    type="text"
                    wire:model="city_town"
                    placeholder="City/Town">
                @error('city_town') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2">
                    <b>
                        Province
                    </b>
                </lable>
                <input
                    class="form-control @error('province') border-danger @enderror"
                    type="text"
                    wire:model="province"
                    placeholder="Province">
                @error('province') <span class="error-text">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <lable class="p-2">
                    <b>
                        Postal Code
                    </b>
                </lable>
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
                        <button class="ps-btn-cancel ps-btn-cancel--sm" wire:click="$emit('updateTab','address')">Cancel</button>

                        <template  x-if="$wire.action=='add'">
                        <button class="ps-btn ps-btn--sm" wire:click="createAddress()">Create</button>
                        </template>

                        <template  x-if="$wire.action=='update'">
                            <button   class="ps-btn ps-btn--sm" wire:click="updateAddress('{{$address_id}}')">Update</button>
                        </template>

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
