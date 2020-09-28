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
                                    <div class="ps-form__billing-info">
                                        <h3 class="ps-form__heading">Contact Information</h3>
                                        <div class="form-group">
                                            <label>Email or Phone number</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <div class="ps-checkbox">
                                                <input class="form-control" type="checkbox" id="keep-update" placeholder="">
                                                <label for="keep-update">Keep me up to date on news and exclusive offers?</label>
                                            </div>
                                        </div>
                                        <h3 class="ps-form__heading">Shipping Address</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" type="text" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" type="text" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Apartment</label>
                                            <input class="form-control" type="text" placeholder="">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" type="text" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input class="form-control" type="text" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="ps-checkbox">
                                                <input class="form-control" type="checkbox" id="save-next-time" placeholder="">
                                                <label for="save-next-time">Keep me up to date on news and exclusive offers?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
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
        <div class="ps-newsletter">
            <div class="ps-container">
                <form class="ps-form--newsletter" action="do_action" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" placeholder="Email address">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @endsection 