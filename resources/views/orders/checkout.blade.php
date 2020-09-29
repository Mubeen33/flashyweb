@extends('layouts.master')

@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="user-information.html">Account</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Checkout Information</h3>
                </div>
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="index.html" method="get">
                        <div class="ps-form__content">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">

                                   <div class="ps-block--shopping-total">
                                        <h3><b>Order Summary</b></h3><br>
                                        @foreach(session('cart') as $data)
                                        <?php
                                                $tquantity = 0;
                                                $tPrice    = 0;
                                                $priceProduct    = $data['price']*$data['quantity'];
                                                $tPrice      += $priceProduct;
                                        ?>        
                                        @endforeach
                                        <div class="row">
                                            <div class="col-xl-4 col-12 col-md-4">
                                                <p><b>SubTotal:</b>  R{{$tPrice}}</p>
                                            </div>
                                            <div class="col-xl-4 text-center col-12 col-md-4">
                                                <p class="shippPrice"><b>Shipping:</b>  TBC</p>
                                            </div>
                                            <div class="col-xl-4 text-right col-12 col-md-4" >
                                                <p>Grand Total: <b style="font-size:20px" class="grandTotal">  R{{$tPrice}}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><b>My Cart</b></h3>
                                    <table class="table">
                                        @foreach(session('cart') as $data)
                                        <?php
                                                $tquantity = 0;
                                                $tPrice    = 0;
                                                $priceProduct    = $data['price']*$data['quantity'];
                                                $tPrice      += $priceProduct;
                                        ?>        
                                        
                                            <tr>
                                                <td>
                                                    <div class="ps-product--cart">
                                                        <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{$data['image']}}" alt=""></a></div>
                                                        <div class="ps-product__content"><a href="product-default.html"><?=$data['name']?>
                                                                
                                                            </a>
                                                            <p></p>
                                                            <p>
                                                                <div class="form-group--number">

                                                                <!-- Quantity Plus Button -->

                                                                <button class="up" id="up{{$data['v_p_id']}}" type="button" onclick="add(this.id,{{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})">+</button>

                                                                <!-- Quantity Minus Button -->

                                                                <button class="down" id="down{{$data['v_p_id']}}" type="button" onclick="minus(this.id,{{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})">-</button>

                                                                <!-- Quantity Input Box -->

                                                                <input class="form-control" type="text" placeholder="" onchange="updateQuantity({{$data['product_id']}},{{$data['v_p_id']}},{{$data['price']}},{{$data['vendor_id']}})" value="{{$data['quantity']}}" id="qty{{$data['v_p_id']}}">
                                                                </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td colspan="2" class="price td-custom text-right"><b>R{{$data['price']}}</b></td>
                                                <td colspan="3" class="td-custom text-right"><b>R<?php echo $data['price']*$data['quantity'] ?></b></td>
                                                <td colspan="1" class="td-custom"><a href="" onclick="remove_cart_items({{$data['v_p_id']}})"><i class="icon-cross"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7" class="text-right">Shipping:</td>
                                            <td colspan="1" class="ShippingPrice">TBC</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-right">Total:</td>
                                            <td colspan="1"><b class="grandTotal">R{{$tPrice}}</b></td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Checkout</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__items"><a href="#"><strong>Marshall Kilburn Portable Wireless Speaker</strong><span>x1</span><small>$ 42.99</small></a><a href="#"><strong>Herschel Leather Duffle Bag In Brown Color</strong><span>x1</span><small>$ 125.30</small></a>
                                            </figure>
                                            <figure>
                                                <figcaption><strong>Subtotal</strong><strong>$1259.999</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__shipping">
                                                <h3>Shipping</h3>
                                                <p>Calculated at next step</p>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection 