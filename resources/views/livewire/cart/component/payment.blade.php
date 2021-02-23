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
                            <a href="product-default.html">

                                <div class="ps-form__decs">
                                    <div class="ps-radio">
                                        <input  type="radio" id="{{'personal-address-'.$method['id']}}" wire:model="selectedAddress"  value="{{$method['id']}}">
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








{{--        <tr>--}}
{{--            <td>--}}
{{--                <div class="ps-product--cart " >--}}
{{--                    <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">--}}

{{--                            <div class="ps-form__decs">--}}
{{--                                <div class="ps-radio">--}}
{{--                                    <input  type="radio" id="user-type-3" name="user-type">--}}
{{--                                    <label for="user-type-3"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="ps-product__content text-left">--}}
{{--                        <Strong>--}}
{{--                            <h3 >MasterPass</h3>--}}
{{--                        </Strong>--}}
{{--                        <p>--}}
{{--                            Dummy Text for Bank Payment Method--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Absa.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/FNB.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Standard.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Capitec.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Investec.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/TymeBank.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Bidvest.svg')}}">--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--            <td class="price text-center">--}}
{{--                <div>--}}
{{--                    <a href="#">Info</a>--}}

{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                <div class="ps-product--cart " >--}}
{{--                    <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">--}}

{{--                            <div class="ps-form__decs">--}}
{{--                                <div class="ps-radio">--}}
{{--                                    <input  type="radio" id="user-type-3" name="user-type">--}}
{{--                                    <label for="user-type-3"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="ps-product__content text-left">--}}
{{--                        <Strong>--}}
{{--                            <h3 >eBucks</h3>--}}
{{--                        </Strong>--}}
{{--                        <p>--}}
{{--                            Dummy Text for Bank Payment Method--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Absa.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/FNB.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Standard.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Capitec.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Investec.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/TymeBank.svg')}}">--}}
{{--                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Bidvest.svg')}}">--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--            <td class="price text-center">--}}
{{--                <div>--}}
{{--                    <a href="#">Info</a>--}}

{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
        <tr>
            <td></td>
            <td></td>
        </tr>

        </tbody>
    </table>
    @include('.livewire/cart/component/footer',['action'=>'view'])

</div>
