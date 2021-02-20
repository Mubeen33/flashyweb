<div x-show.transition.duration.scale.0="open=='payment'">
    <table class="table ps-table--shopping-cart" >
        <thead>
        <tr>
            <th>How Would you like to pay</th>
            <th>Info</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="ps-product--cart " >
                    <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">

                            <div class="ps-form__decs">
                                <div class="ps-radio">
                                    <input class="form-control" type="radio" id="user-type-2" name="user-type">
                                    <label for="user-type-2"></label>
                                </div>
                            </div>
                            {{--                                        <input type="radio">--}}
                            {{--                                        <img src="http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg" alt="">--}}
                        </a>
                    </div>
                    <div class="ps-product__content text-left">
                        <Strong>
                            <h3 >Credit & Debit Card</h3>
                        </Strong>
                        <p>
                            Dummy Text for Bank Payment Method
                        </p>
                       <p>
                           <img class="pr-3" src="{{url('app-assets/images/payment-method/Visa.svg')}}">
                           <img class="pr-3" src="{{url('app-assets/images/payment-method/Mastercard.svg')}}">
                           <img class="pr-3" src="{{url('app-assets/images/payment-method/Amex.svg')}}">
                           <img class="pr-3" src="{{url('app-assets/images/payment-method/Diners.svg')}}">
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
        <tr>
            <td>
                <div class="ps-product--cart " >
                    <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">

                            <div class="ps-form__decs">
                                <div class="ps-radio">
                                    <input class="form-control" type="radio" id="user-type-3" name="user-type">
                                    <label for="user-type-3"></label>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="ps-product__content text-left">
                        <Strong>
                            <h3 >MasterPass</h3>
                        </Strong>
                        <p>
                            Dummy Text for Bank Payment Method
                        </p>
                        <p>
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Absa.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/FNB.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Standard.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Capitec.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Investec.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/TymeBank.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Bidvest.svg')}}">
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
        <tr>
            <td>
                <div class="ps-product--cart " >
                    <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">

                            <div class="ps-form__decs">
                                <div class="ps-radio">
                                    <input class="form-control" type="radio" id="user-type-3" name="user-type">
                                    <label for="user-type-3"></label>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="ps-product__content text-left">
                        <Strong>
                            <h3 >eBucks</h3>
                        </Strong>
                        <p>
                            Dummy Text for Bank Payment Method
                        </p>
                        <p>
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Absa.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/FNB.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Standard.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Capitec.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Investec.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/TymeBank.svg')}}">
                            <img class="pr-3" src="{{url('app-assets/images/payment-method/Bidvest.svg')}}">
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
        <tr>
            <td></td>
            <td></td>
        </tr>

        </tbody>
    </table>
    @include('.livewire/cart/component/footer',['action'=>'view'])

</div>
