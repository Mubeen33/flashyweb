<div x-show.transition.in="open=='payment'">
    <table class="table ps-table--shopping-cart" >
        <thead>
        <tr>
            <th>How Would you like to pay</th>
            <th>Info</th>
        </tr>
        </thead>
        <tbody>

        @foreach($paymentMethods as $method)
            <tr>
                <td>
                    <div class="ps-product--cart " >
                        <div class="ps-product__thumbnail" style="max-width:20px;">
                            <a href="#" wire:ignor.self>

                                <div class="ps-form__decs">
                                    <div class="ps-radio">
                                        <input  type="radio" id="{{'personal-address-'.$method['id']}}" wire:model="paymentMethod"  value="{{$method['enum']}}">
                                        <label for="{{'personal-address-'.$method['id']}}"></label>
                                    </div>
                                </div>

                            </a>
                        </div>
                        <div class="ps-product__content text-left">
                            <Strong>
                                <h3 >{{$method['title']}}</h3>
                            </Strong>
                            <p>
                                {{$method['description']}}
                            </p>
                            <p>
                                @foreach($method['images'] as $image)
                                <img class="pr-3" src="{{url($image)}}">
                                    @endforeach

                            </p>
                        </div>
                    </div>
                </td>
                <td class="price text-center">
                    <div>
                        <a href="#">Info</a>

                    </div>
                </td>
            </tr>
        @endforeach
                @error('paymentMethod')
                        @php
                            $this->resetValidation('paymentMethod');
                            $this->dispatchBrowserEvent('swal', [
                            'title' => 'Required!',
                            'icon' => 'warning',
                            'message' => $message,
                             ]);
                        @endphp
                @enderror
        <tr>
            <td></td>
            <td></td>
        </tr>

        </tbody>
    </table>
    @include('.livewire/cart/component/footer',['action'=>'address,confirm'])

</div>
