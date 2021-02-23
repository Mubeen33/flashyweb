<div class="ps-section__footer">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">


            <table class="table ps-table--shopping-cart" x-show="isActiveTab('payment')">
                <thead>
                <tr>
                    <th>When Would you like to deliver it</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="ps-product--cart " >
                            <div class="ps-product__thumbnail" style="max-width:20px;"><a href="product-default.html">

                                    <div class="ps-form__decs">
                                        <div class="ps-radio">
                                            <input class="form-control" type="radio" id="user-type-1" name="user-type">
                                            <label for="user-type-1"></label>
                                        </div>
                                    </div>
                                    {{--                                        <input type="radio">--}}
                                    {{--                                        <img src="http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg" alt="">--}}
                                </a>
                            </div>
                            <div class="ps-product__content">
                                <Strong>
                                    <h3 >Monday, 08 February 2021 <button class="btn btn-xs btn-warning rounded-pill pr-4 pl-4 mb-2 ml-4"><strong>Why the Wait?</strong></button></h3>

                                </Strong>

                                <p>
                                    Stander Delivery (First Delivery Free)
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="price text-center">
                        <div>
                            <h3 style="display: inline; color:#666666; margin-top: -2px" class=" P-1">Free</h3>

                        </div>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>


            <div class="ps-post__content">
                <div class="ps-post__top">
                    <div class="ps-post__meta"><a href="#">Technology</a>
                    </div><a class="ps-post__title" href="#">B&amp;O Play – Best Headphone For You</a>
                    <p>Lorem ipsum dolor sit amet, dolor siterim consectetur adipiscing elit. Phasellus duio faucibus est sed…</p>
                </div>
{{--                <div class="ps-post__bottom">--}}
{{--                    <p>December 17, 2017 by<a href="#"> drfurion</a></p>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="ps-block--shopping-total">
                <div class="ps-block__header">
                    <p>Subtotal  ({{$totalItem}} Items)<span> R {{$subTotal}} </span></p>
                </div>
                <div class="ps-block__content">
                    <ul class="ps-block__product">
                        <li>
                            <span class="ps-block__shop">Secure Check out</span>
                            <span class="ps-block__shipping">Many ways to Pay</span>
                            <span class="ps-block__estimate">
                                                <strong>Delivery</strong>
                                                <a href="#">Fast ,Reliable Delivery</a>
                                            </span>
                        </li>
                    </ul>
                    <h3>Total   <span>R {{$subTotal}}</span></h3>
                </div>

            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="ps-section__cart-actions pt-0"><a class="ps-btn" href="{{route('frontend.rootPage')}}">
                    <i class="icon-arrow-left"></i> Back to Shop</a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"></div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
{{--            <button class="ps-btn ps-btn--fullwidth" @click="open ='{{$action}}'">Proceed to checkout</button>--}}
                <button x-show="open !='delivery'" class="ps-btn ps-btn--fullwidth" wire:click="proceedOrder('{{$action}}')">  Proceed to checkout</button>

        </div>

        </div>
</div>
