@extends('layouts.master')


@push('styles')
<style type="text/css">
    .border-danger-alert{
        border: 1px solid red
    }
</style>
@endpush
@section('content')
    <main class="ps-page--my-account">
        <div class="lds-hourglass"></div>

        <livewire:cart.view />
{{--        <livewire:add-to-cart.delivery-cart />--}}

{{--        <livewire:add-to-cart.customer-address-form />--}}








{{--        <section class="ps-section--account ps-checkout">--}}
{{--            <div class="container">--}}
{{--                @include('msg.msg')--}}

{{--                <div id="error_messages" class="d-none">--}}
{{--                    <div class="alert alert-danger">--}}
{{--                      <span class="place_message"></span>--}}
{{--                      <button type="button" class="close" onclick="document.getElementById('error_messages').classList.add('d-none')">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                      </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="ps-section__header">--}}
{{--                    <h3>Checkout Information</h3>--}}
{{--                </div>--}}
{{--                <div class="ps-section__content">--}}
{{--                    <form id="checkout___form" class="ps-form--checkout" action="{{ route('saveCheckoutData.post') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="ps-form__content">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">--}}

{{--                                   <div class="ps-block--shopping-total">--}}
{{--                                        <h3><b>Order Summary</b></h3><br>--}}
{{--                                        <?php $tquantity = 0;$tPrice    = 0; ?>--}}
{{--                                        @foreach(session('cart') as $data)--}}
{{--                                        <?php--}}

{{--                                                $priceProduct = $data['price']*$data['quantity'];--}}
{{--                                                $tPrice      += $priceProduct;--}}
{{--                                        ?>--}}
{{--                                        @endforeach--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-xl-4 col-12 col-md-4">--}}
{{--                                                <p><b>SubTotal:</b>  R{{$tPrice}}</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xl-4 text-center col-12 col-md-4">--}}
{{--                                                <p class="shippPrice"><b>Shipping:</b>  TBC</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xl-4 text-right col-12 col-md-4" >--}}
{{--                                                <p>Grand Total: <b style="font-size:20px" class="grandTotal">  R{{$tPrice}}</b></p>--}}
{{--                                                <input type="hidden" name="grandTotal" value="{{$tPrice}}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <h3><b>My Cart</b></h3>--}}
{{--                                    <table class="table">--}}
{{--                                        <?php $tquantity = 0;$tPrice    = 0; ?>--}}
{{--                                        @foreach(session('cart') as $data)--}}
{{--                                        <?php--}}

{{--                                                $priceProduct    = $data['price']*$data['quantity'];--}}
{{--                                                $tPrice      += $priceProduct;--}}
{{--                                        ?>--}}

{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="ps-product--cart">--}}
{{--                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{$data['image']}}" alt=""></a></div>--}}
{{--                                                        <div class="ps-product__content"><a href="product-default.html"><?=$data['name']?>--}}

{{--                                                            </a>--}}
{{--                                                            <p></p>--}}
{{--                                                            <p>--}}
{{--                                                                <div class="form-group--number">--}}

{{--                                                                <!-- Quantity Plus Button -->--}}

{{--                                                                <button class="up" id="up{{$data['v_p_id']}}" type="button" onclick="add(this.id,{{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})">+</button>--}}

{{--                                                                <!-- Quantity Minus Button -->--}}

{{--                                                                <button class="down" id="down{{$data['v_p_id']}}" type="button" onclick="minus(this.id,{{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})">-</button>--}}

{{--                                                                <!-- Quantity Input Box -->--}}

{{--                                                                <input name="quantity" class="form-control" type="text" placeholder="" onchange="updateQuantity({{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})" value="{{$data['quantity']}}" id="qty{{$data['v_p_id']}}">--}}
{{--                                                                </div>--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td colspan="2" class="price td-custom text-right"><b>R{{$data['price']}}</b></td>--}}
{{--                                                <td colspan="3" class="td-custom text-right"><b>R<?php echo $data['price']*$data['quantity'] ?></b></td>--}}
{{--                                                <td colspan="1" class="td-custom"><a href="" onclick="remove_cart_items({{$data['v_p_id']}})"><i class="icon-cross"></i></a></td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="7" class="text-right">Shipping:</td>--}}
{{--                                            <td colspan="1" class="ShippingPrice">TBC</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="7" class="text-right">Total:</td>--}}
{{--                                            <td colspan="1"><b class="grandTotal">R{{$tPrice}}</b></td>--}}
{{--                                        </tr>--}}


{{--                                        <tr>--}}
{{--                                            <td colspan="8" class="text-right">--}}
{{--                                                <button id="submitCheckoutForm_" class="btn btn-warning" type="submit">Continue</button>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}

{{--                                </div>--}}
{{--                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">--}}
{{--                                    <div class="ps-block--checkout-order">--}}
{{--                                        <div class="ps-block__content">--}}
{{--                                            <figure>--}}
{{--                                                <figcaption><strong>Checkout</strong></figcaption>--}}
{{--                                            </figure>--}}
{{--                                           <?php--}}
{{--                                                $get_address = (\App\Models\CustomerAddress::where('customer_id', Auth::guard('customer')->user()->id)->get());--}}
{{--                                            ?>--}}
{{--                                            @if(count($get_address)>0)--}}
{{--                                                <table class="usraddress">--}}
{{--                                                    <tbody>--}}
{{--                                                @foreach($get_address as $address)--}}
{{--                                                        <tr>--}}
{{--                                                            <td colspan="1"><input type="radio"  name="address" value="{{$address->id}}"></td>--}}
{{--                                                            <td colspan="4" class="address">{{$address->address}} ,{{$address->city}} ,{{$address->state}} ,{{$address->subrub}} ,{{$address->zip_code}} </td>--}}
{{--                                                        </tr>--}}
{{--                                                @endforeach--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            @else--}}
{{--                                                    <div class="none-address">--}}
{{--                                                        <p class="text-center">--}}
{{--                                                            <img src="https://images.onedayonly.co.za/resources/images/checkout/new/buildings.svg" style="width: 10rem;height: 10rem">--}}
{{--                                                        </p>--}}
{{--                                                        <p class="text-center">Your saved addresses will appear here.</p>--}}
{{--                                                        <p class="text-center">--}}
{{--                                                            <button class="ps-btn btn-warning offset-2" data-toggle="modal" type="button" data-target="#addressAddModel" style="color: #fff"> + add new address</button>--}}
{{--                                                        </p>--}}
{{--                                                    </div><br>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                            <div class="ps-block--checkout-order">--}}
{{--                                            <div class="ps-block__content">--}}
{{--                                                <figure>--}}
{{--                                                    <figcaption><strong>Payments</strong></figcaption>--}}
{{--                                                </figure>--}}
{{--                                                <div style="padding:10px">--}}
{{--                                                    <i class="fa fa-lock" style="font-size:20px; color:#999999"></i> Your data is secure and--}}
{{--                                                    encrypted.--}}
{{--                                                </div>--}}
{{--                                           <table  class="payment">--}}
{{--                                               <tbody>--}}
{{--                                                   <tr>--}}
{{--                                                       <td class="eft"><input type="radio" name="payment_options" value="EFT"></td>--}}
{{--                                                       <!-- <td class="eft"><img src="img/banktransfer.png" width="60"></td> -->--}}
{{--                                                       <td>EFT</td>--}}
{{--                                                       <!-- <td>Our recommended: Send proof of payment within immediately to avoid cancellation</td> -->--}}
{{--                                                   </tr>--}}
{{--                                                   <tr>--}}
{{--                                                       <td class="debit_visa"><input type="radio" name="payment_options" value="Debit"></td>--}}
{{--                                                       <!-- <td class="debit_visa"><img src="img/visa_debit.jpg" width="60"></td> -->--}}
{{--                                                       <td>Debit</td>--}}
{{--                                                   </tr>--}}
{{--                                                   <tr>--}}
{{--                                                       <td class="visa"><input type="radio" name="payment_options" value="Visa"></td>--}}
{{--                                                       <!-- <td class="visa"><img src="img/visa.png" width="60"></td> -->--}}
{{--                                                       <td>Visa</td>--}}
{{--                                                   </tr>--}}
{{--                                                   <tr>--}}
{{--                                                       <td class="master"><input type="radio" name="payment_options" value="Master"></td>--}}
{{--                                                       <!-- <td class="master"><img src="img/mastercard.png" width="60"></td> -->--}}
{{--                                                       <td>Master</td>--}}
{{--                                                   </tr>--}}
{{--                                                   <tr>--}}
{{--                                                       <td class="ozow"><input type="radio" name="payment_options" value="Ozow_ipay"></td>--}}
{{--                                                       <!-- <td class="ozow"><img src="img/ozow_ipay.png" width="60"></td> -->--}}
{{--                                                       <td>Ozow_ipay</td>--}}
{{--                                                   </tr>--}}
{{--                                               </tbody>--}}
{{--                                           </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        {{-- new address adding form --}}
        @include("orders.partials.add-new-address-modal")

    @endsection





@push('scripts')
<script type="text/javascript">

$("#checkout___form").on('submit', function(e){
    if ($("#checkout___form input[name=address]").prop('checked') !== true) {
        e.preventDefault()
        $("#error_messages .place_message").html("Please Select Address");
        $("#error_messages").removeClass("d-none");
        $('html, body').animate({
            scrollTop: $("#error_messages").offset().top
        }, 1000);
        return;
    }

    if ($("#checkout___form input[name=payment_options]").prop('checked') !== true) {
        e.preventDefault()
        $("#error_messages .place_message").html("Please Select Payment Method");
        $("#error_messages").removeClass("d-none");
        $('html, body').animate({
            scrollTop: $("#error_messages").offset().top
        }, 1000);
        return;
    }

    $("#checkout___form").submit()

})

</script>


@endpush
