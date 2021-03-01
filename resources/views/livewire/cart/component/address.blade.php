<div  x-show.transition.in="open=='address'">
    <div >
        <table class="table ps-table--shopping-cart">
            <thead>
            <tr>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            {{--    <template  x-for="address in addressList">--}}
            @foreach($addressList as $address)
                <tr>
                    <td>
                        <div class="ps-product--cart ">
                            <div class="ps-product__thumbnail" style="max-width:20px;">

                                <div class="form-group">
                                    <div class="ps-form__decs">
                                        <div class="ps-radio">
                                            <input  type="radio" id="{{'personal-address-'.$address->id}}" wire:model="selectedAddress"  value="{{$address->id}}">
                                            <label for="{{'personal-address-'.$address->id}}"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product__content text-left">
                                <Strong>
                                    <h3> {{$address->street_address}}
                                        <button class="btn btn-xs btn-warning rounded-pill pr-4 pl-4 mb-2 ml-4"><strong>check</strong>
                                        </button>
                                    </h3>

                                </Strong>

                                <p>
                                    {{$address->full_address}}

                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="price text-center">
                        <div>
                            <a href="#" wire:click="deleteAddress('{{$address->id}}')">Delete</a>
                            <h3 style="display: inline; color:#666666; margin-top: -2px" class=" P-1">.</h3>
                            <a href="#" wire:ignore.self wire:click="$emit('editAddress','{{$address->id}}')">Edit</a>
                        </div>
                    </td>

                </tr>
            @endforeach
            @error('selectedAddress')
                @php
                    $this->resetValidation('selectedAddress');
                    $this->dispatchBrowserEvent('swal', [
                    'title' => 'Required!',
                    'icon' => 'warning',
                    'message' => $message,
                     ]);
                @endphp
            @enderror

            {{--    </template>--}}

            <tr>
                <td></td>
                <td>
                    <div class="ps-section__cart-actions pt-0 pb-3 float-right" x-show="open=='address'">
                        <button class="ps-btn" @click="updateComponent('add-address')">
                            <strong><i class="icon-plus"></i></strong> Add New Address
                        </button>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    @include('.livewire/cart/component/footer',['action'=>'delivery,payment'])
</div>
