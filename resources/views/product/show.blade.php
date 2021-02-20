@extends('layouts.master')

@section('content')
<style type="text/css">
    .product-variation{
        cursor: pointer;
        min-width: 5rem;
        min-height: 2.125rem;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: .25rem .75rem;
        margin: 0 8px 8px 0;
        color: rgba(0,0,0,.8);
        font-size: 12px;
        text-align: left;
        border-radius: 2px;
        border: 1px solid rgba(0,0,0,.09);
        position: relative;
        background: #fff;
        outline: 0;
        word-break: break-word;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -moz-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;}

    .Active1 {
        color: #fff;
        padding: 5px 5px;
        border-color:white;
        background: #ee4d2d;
    }
    .Active2 {
        color: #fff;
        padding: 5px 5px;
        border-color:white;
        background: #ee4d2d;
    }
</style>

@foreach($getProductData as $productData)




@endforeach
<nav class="navigation--mobile-product"><a class="ps-btn ps-btn--black" href="shopping-cart.html">Add to cart</a><a class="ps-btn" href="checkout.html">Buy Now</a></nav>
    <div class="ps-breadcrumb">
        <div class="ps-container">
            @include('Partials.breadcrumb')
        </div>
    </div>
    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                @include('product.partials.product-gallery')
                            </div>

                            <div class="ps-product__info">
                                <h1>{{$data->title}}</h1>
                                <div class="ps-product__meta">
                                    <p>Brand:<a href="shop-default.html">Sony</a></p>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>(1 review)</span>
                                    </div>
                                </div>
                                <h4 class="ps-product__price">
                                    @php
                                        $get_product_variations = (\App\Models\ProductVariation::where('product_id', $productData->product_id)->get());
                                    @endphp

                                    @if(count($get_product_variations)>0)

@php
    $variantPrices = (\App\Models\VendorProduct::where('prod_id', $productData->product_id)->where('active',1)->selectRaw("MAX(price) AS max_price, MIN(price) AS min_price")->get());

    $activeVariants = (\App\Models\VendorProduct::where('prod_id', $productData->product_id)->where('active',1)->groupby('variation_id')->get());

@endphp

                                                @if(count($activeVariants)>1)
                                                    @foreach($variantPrices as $variantPrice)

                                                            {{env('PRICE_SYMBOL').$variantPrice->min_price}} - {{env('PRICE_SYMBOL').$variantPrice->max_price}}

                                                    @endforeach
                                                @else
                                                    @foreach($variantPrices as $variantPrice)


                                                            {{env('PRICE_SYMBOL').$variantPrice->min_price}}

                                                    @endforeach
                                                @endif
                                    @else
                                            {{env('PRICE_SYMBOL').$productData->price}}
                                    @endif


                                </h4>
                                <div class="ps-product__desc">
                                    @php
                                        $vendorName = (App\Models\Vendor::where('id',$productData->vendorid)->value('company_name'));
                                    @endphp
                                    <p>Sold By:<a href="shop-default.html"><strong id="vendorName"> {{ $vendorName }}</strong></a></p>
                                    <ul class="ps-list--dot">
                                        <li> Unrestrained and portable active stereo speaker </li>
                                        <li> Free from the confines of wires and chords </li>
                                        <li> 20 hours of portable capabilities </li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included </li>
                                        <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X </li>
                                    </ul>
                                </div>
                                    <div class="ps-product__variations">
@php
        $activeVariants = (\App\Models\VendorProduct::where('prod_id',$productData->product_id)->where('active',1)->groupby('variation_id')->get());

@endphp
                                @if(count($activeVariants)==1)
                                    @if(!empty($productData->first_variation_value))
                                        <figure>
                                            <figcaption><strong>{{$productData->first_variation_name}}:</strong></figcaption>
                                            <button class="product-variation option">{{$productData->first_variation_value}}</button>
                                        </figure>

                                    @endif
                                    @if(!empty($productData->second_variation_value))
                                        <figure>
                                            <figcaption><strong>{{$productData->second_variation_name}}:</strong></figcaption>
                                            <button class="product-variation option1">{{$productData->second_variation_value}}</button>

                                        </figure>
                                    @endif
                                @else
                                    @if(!empty($productData->first_variation_value))
                                        @php
                                            $productVariantions = (\App\Models\ProductVariation::where('product_id',$productData->product_id)->Distinct()->get(['first_variation_value']));
                                        @endphp
                                        <figure>
                                            <figcaption><strong>{{$productData->first_variation_name}}:</strong></figcaption>
                                            @foreach($productVariantions as $variants)
                                                <button class="product-variation option">{{$variants->first_variation_value}}</button>
                                            @endforeach
                                        </figure>
                                    @endif
                                    @if(!empty($productData->second_variation_value))
                                        @php
                                            $productVariantions = (\App\Models\ProductVariation::where('product_id',$productData->product_id)->Distinct()->get(['second_variation_value']));
                                        @endphp
                                        <figure>
                                            <figcaption><strong>{{$productData->second_variation_name}}:</strong></figcaption>
                                            @foreach($productVariantions as $variants)
                                                <button class="product-variation option1">{{$variants->second_variation_value}}</button>
                                            @endforeach
                                        </figure>
                                    @endif
                                @endif
                                    </div>
                                <div class="ps-product__shopping">
                                    <figure>
                                        <figcaption>Quantity</figcaption>
                                        <div class="form-group--number">
                                            <button class="up"><i class="fa fa-plus"></i></button>
                                            <button class="down"><i class="fa fa-minus"></i></button>
                                            <input class="form-control" type="number" value="1" min="1"  id="quantity">
                                        </div>
                                    </figure>
                                    <button class="ps-btn ps-btn--black" id="cart">Add to cart</button>
                                        <a class="ps-btn ps-btn--black" href="{{route('order.process')}}" id="go_cart">Go to cart</a>

                                    <button class="ps-btn" type="button" id="buynow">Buy Now</button>
                                    <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                                </div>
                                <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                                    <p><strong>SKU:</strong> {{$data->sku}}</p>
                                    @include('product.partials.category-flow', ['categoryFlow'=>$categoryFlow])
                                    <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                                </div>
                                <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                <li><a href="#tab-2">Specification</a></li>
                                <li><a href="#tab-3">Vendor</a></li>
                                <li><a href="#tab-4">Reviews (1)</a></li>
                                <li><a href="#tab-5">Questions and Answers</a></li>
                                <li><a href="#tab-6">More Offers</a></li>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    @include('product.partials.description')
                                </div>
                                <div class="ps-tab" id="tab-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered ps-table ps-table--specification">
                                            <tbody>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Black, Gray</td>
                                                </tr>
                                                <tr>
                                                    <td>Style</td>
                                                    <td>Ear Hook</td>
                                                </tr>
                                                <tr>
                                                    <td>Wireless</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>Dimensions</td>
                                                    <td>5.5 x 5.5 x 9.5 inches</td>
                                                </tr>
                                                <tr>
                                                    <td>Weight</td>
                                                    <td>6.61 pounds</td>
                                                </tr>
                                                <tr>
                                                    <td>Battery Life</td>
                                                    <td>20 hours</td>
                                                </tr>
                                                <tr>
                                                    <td>Bluetooth</td>
                                                    <td>Yes</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-3">
                                    <h4>{{ $data->get_vendor->company_name }}</h4>
                                </div>
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>4.00</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                        <option value="1">4</option>
                                                        <option value="2">5</option>
                                                    </select><span>1 Review</span>
                                                </div>
                                                <div class="ps-block__star"><span>5 Star</span>
                                                    <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                                </div>
                                                <div class="ps-block__star"><span>4 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>3 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>2 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                                <div class="ps-block__star"><span>1 Star</span>
                                                    <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                            <form class="ps-form--review" action="index.html" method="get">
                                                <h4>Submit Your Review</h4>
                                                <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                                <div class="form-group form-group__rating">
                                                    <label>Your rating of this product</label>
                                                    <select class="ps-rating" data-read-only="false">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                        <div class="form-group">
                                                            <input class="form-control" type="email" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group submit">
                                                    <button class="ps-btn">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-5">
                                    <div class="ps-block--questions-answers">
                                        <h3>Questions and Answers</h3>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab active" id="tab-6">
                                    <p>Sorry no more offers available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_product widget_features">
                        <p><i class="icon-network"></i> Shipping worldwide</p>
                        <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                        <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                        <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                    </aside>
                    <aside class="widget widget_sell-on-site">
                        <p><i class="icon-store"></i> Sell on Flashybuy?<a href="{{ route('frontend.becomeAVendor.get') }}"> Register Now !</a></p>
                    </aside>
                    {{-- <aside class="widget widget_ads"><a href="#"><img src="{{ asset('img/ads/product-ads.png')}}" alt=""></a></aside> --}}
                    @include('product.partials.other-offers')
                </div>
            </div>
            <div class="ps-product-list ps-clothings">
                <div class="ps-container">
                    <div class="ps-section__header">
                        <h3>Customers who bought this item also bought</h3>

                    </div>
                    <div class="ps-section__content">
                        <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                         <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2432px;"><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img  src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <div class="ps-product__badge">-16%</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select>
                                            <div class="br-widget br-readonly">

                                                <div class="br-current-rating">1</div>
                                            </div>
                                            </div><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless</a>
                                        <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img  src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <div class="ps-product__badge hot">hot</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly">
                                                <div class="br-current-rating">1</div></div></div><span>01</span>
                                        </div>
                                        <p class="ps-product__price">$101.99</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                        <p class="ps-product__price">$101.99</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img  src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <div class="ps-product__badge">-25%</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>02</span>
                                        </div>
                                        <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                        <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>01</span>
                                        </div>
                                        <p class="ps-product__price">$320.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                        <p class="ps-product__price">$320.00</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>01</span>
                                        </div>
                                        <p class="ps-product__price">$85.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                        <p class="ps-product__price">$85.00</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item active" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Store</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>01</span>
                                        </div>
                                        <p class="ps-product__price">$92.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                        <p class="ps-product__price">$92.00</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <div class="ps-product__badge">-46%</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>02</span>
                                        </div>
                                        <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                        <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Edifier Powered Bookshelf Speakers</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>02</span>
                                        </div>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Edifier Powered Bookshelf Speakers</a>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>02</span>
                                        </div>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                </div>
                            </div></div><div class="owl-item" style="width: 243.2px;"><div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ asset('img/products/shop/4.jpg')}}"  alt=""></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                        <div class="ps-product__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><div class="br-current-rating">1</div></div></div><span>02</span>
                                        </div>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                        <p class="ps-product__price">$42.00</p>
                                    </div>
                                </div>
                            </div></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-chevron-right"></i></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
                    </div>
                </div>
            </div>

            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @include('product.partials.related-products', ['products'=>$related_products])
                    </div>
                </div>
            </div>

        </div>
    </div>
@php
                                        $get_product_variations = (\App\Models\ProductVariation::where('product_id', $productData->product_id)->get());
                                    @endphp

                                    @if(count($get_product_variations)>0)

@php
    $variantPrices = (\App\Models\VendorProduct::where('prod_id', $productData->product_id)->where('active',1)->selectRaw("MAX(price) AS max_price, MIN(price) AS min_price")->get());

    $activeVariants = (\App\Models\VendorProduct::where('prod_id', $productData->product_id)->where('active',1)->groupby('variation_id')->get());

@endphp

                                                @if(count($activeVariants)>1)
                                                    @foreach($variantPrices as $variantPrice)

                                                            <input type="hidden" name="" value="" id="price">

                                                    @endforeach
                                                @else
                                                    @foreach($variantPrices as $variantPrice)


                                                            <input type="hidden" name="" value="{{$variantPrice->min_price}}" id="price">{{$variantPrice->min_price}}

                                                    @endforeach
                                                @endif
                                    @else

<input type="hidden" name="" value="{{$productData->price}}" id="price">
                                    @endif
<input type="hidden" name="id" value="{{$productData->product_id}}" id="productid">
<input type="hidden" name="ven_id" value="{{$productData->vendorid}}" id="vendorid">
<input type="hidden" name=""  value="" id="maxQty">

<input type="text" name=""  value="{{$productData->v_p_id}}" id="v_p_id">
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">

    $( document ).ready(function() {

        cartActionButton();



        var variation1;
        var variation2;

       $(document).delegate(".option","click",function(e){
        e.preventDefault();
        if($('.Active1').length){
           $('.Active1').not($(this)).removeClass('Active1').addClass('option');
        }
           $(this).removeClass('option').addClass('Active1');
           variation1     = $('.Active1').text();
           var token      = $('input[name=_token]').val();
           var product_id = $('input[name=id]').val();

           // $('input[name="product_first_variation"]').val($(this).val());

           if($(".option1").length){
            if($(".Active2").length){

                 getsecondVariation(variation1,variation2,token,product_id);
                 getOtherOffers(variation1,variation2,product_id,token);
             }
           }else{

                getfirstVariation(variation1,token,product_id);
                getsingleOffers(variation1,product_id,vendor_id,token);
           }
     });
       $(document).delegate(".option1","click",function(e){

       e.preventDefault();
        if($('.Active2').length){
           $('.Active2').not($(this)).removeClass('Active2').addClass('option1');
        }
       $(this).removeClass('option1').addClass('Active2');
       var product_id = $('input[name=id]').val();
       variation2     = $('.Active2').text();
       var token      = $('input[name=_token]').val();

       // $('input[name="product_second_variation"]').val($(this).val());

       if($('.Active1').length){

            getsecondVariation(variation1,variation2,token,product_id);
            getOtherOffers(variation1,variation2,product_id,token);

        }
     });

function getfirstVariation(variation1,token,product_id){

        $.ajax({

                type:'POST',
                url : "{{ Route('cart.products.first_variation') }}",
                data:{_token:token,variation1:variation1,product_id:product_id},
                dataType:"json",
                success:function(data){

                    if (data[0] != undefined) {

                        if(data[0].quantity>0){

                          $('.ps-product__price').text('R'+data[0].price);
                          $('#price').val(data[0].price);
                          $("#v_p_id").val(data[0].id);
                          $('#vendorid').val(data[0].ven_id);
                          $('#vendorName').text(data.vendor_name);
                          $("#cart").prop('disabled', false);
                          $("#buynow").prop('disabled', false);
                          if (data.variant_image != undefined) {

                                $('.item.slick-slide.slick-current.slick-active>a').attr('href',data.variant_image);
                                $('.item.slick-slide.slick-current.slick-active>a>img').attr('src',data.variant_image);
                                $('.item.slick-slide.slick-current.slick-active>img').attr('src',data.variant_image);
                          }

                        }else{

                            $('.ps-product__price').html('<strong style="color:red">Out Of Stock.</strong>');
                            $("#cart").prop('disabled', true);
                            $("#buynow").prop('disabled', true);

                        }
                    }else{

                        $('.ps-product__price').html('<strong style="color:red">Out Of Stock.</strong>');
                        $("#cart").prop('disabled', true);
                        $("#buynow").prop('disabled', true);

                    }
                }
        });

}
function getsecondVariation(variation1,variation2,token,product_id) {

        $.ajax({

                type:'POST',
                url : "{{ Route('cart.products.second_variation') }}",
                data:{_token:token,variation1:variation1,variation2:variation2,product_id:product_id},
                dataType:"json",
                success:function(data){

                    if (data[0] != undefined) {

                        if(data[0].quantity>0){

                          $('.ps-product__price').text('R'+data[0].price);
                          $('#price').val(data[0].price);
                          $("#v_p_id").val(data[0].id);
                          $('#vendorid').val(data[0].ven_id);
                          $('#vendorName').text(data.vendor_name);
                          $("#cart").prop('disabled', false);
                          $("#buynow").prop('disabled', false);
                          if (data.variant_image != undefined) {

                                $('.item.slick-slide.slick-current.slick-active>a').attr('href',data.variant_image);
                                $('.item.slick-slide.slick-current.slick-active>a>img').attr('src',data.variant_image);
                                $('.item.slick-slide.slick-current.slick-active>img').attr('src',data.variant_image);
                          }


                        }else{

                            $('.ps-product__price').html('<strong style="color:red">Out Of Stock.</strong>');
                            $("#cart").prop('disabled', true);
                            $("#buynow").prop('disabled', true);

                        }
                    }else{

                        $('.ps-product__price').html('<strong style="color:red">Out Of Stock.</strong>');
                        $("#cart").prop('disabled', true);
                        $("#buynow").prop('disabled', true);

                    }
                }
        });

}
//====================================///
//====== Quantity Box plus  ========= ///
//====================================///

    $(document).delegate(".up","click",function(){

        var val = $('#quantity').val();
        $('#quantity').val(parseInt(val)+1);


    });

//===================================//
//======  Minus Functions  ========= //
//==================================//

    $(document).delegate(".down","click",function(){

        var val = $('#quantity').val();

        if(val>1){

           $('#quantity').val(parseInt(val)-1);
        }

    });
   //========================================//
// ========= Start Cart Functionality =========//
  //========================================//

    $(document).delegate("#cart","click",function(){

        var product_id   = $("#productid").val();
        var vendor_id    = $("#vendorid").val();
        var variation_id = $("#variation_id").val();
        var quantity     = $("#quantity").val();
        var maxQty       = $("#maxQty").val();
        var price        = $('#price').val();
        var v_p_id       = $('#v_p_id').val();


        // if (parseInt(maxQty) < quantity) {
        //     if (!$("div").is("#notify")) {

        //         $(".ps-product__variations").append("<div id='notify' class='btn btn-danger'>Sorry! We have Only "+maxQty+" items in Stock.For Further info Conatct Support.</div>");
        //     }
        // }
        // else if(parseInt(maxQty) >= quantity){

        //     if ($("div").is("#notify")) {

        //         $('#notify').remove();

        //     }
        //     addtoCart(product_id,vendor_id,variation_id,quantity,price,v_p_id);
        // }
        addtoCart(product_id,vendor_id,variation_id,quantity,price,v_p_id);

    });

  //==================================================================//
 //  ========================   Cart Function ===================== ///
//==================================================================//
function addtoCart(product_id,vendor_id,variation_id,quantity,price,v_p_id){

    $.ajax({
           type:"POST",
           url:'{{ route('cart.products.addtocart') }}',
           data        :  {

                                      action       : 'add',
                                      product_id   :  product_id,
                                      variation_id : variation_id,
                                      vendor_id    :  vendor_id,
                                      quantity     :  quantity,
                                      price        :  price,
                                      v_p_id       :  v_p_id,
                                      _token       : $('input[name=_token').val()
                                    },
           success: function(data){

               // hide the cart button
               $('#cart').hide()
               $('#go_cart').show()

                    // showCartInbox(product_id);
                        var data = data.split("`");
                        $('#ps-cart__items').html(data[0]);
                        $('#total_cart_items').html(data[1]);
                        if (data[1] == 0) {

                            $('#ps-cart__items').css('display','none');
                        }else{

                            $('#ps-cart__items').css('display','');
                        }
                    // console.log(data);
           }

    });
}

//
    $(document).delegate("#buynow","click",function(){

        var product_id   = $("#productid").val();
        var vendor_id    = $("#vendorid").val();
        var variation_id = $("#variation_id").val();
        var quantity     = $("#quantity").val();
        var maxQty       = $("#maxQty").val();
        var price        = $('#price').val();
        var v_p_id       = $('#v_p_id').val();


        // if (parseInt(maxQty) < quantity) {
        //     if (!$("div").is("#notify")) {

        //         $(".ps-product__variations").append("<div id='notify' class='btn btn-danger'>Sorry! We have Only "+maxQty+" items in Stock.For Further info Conatct Support.</div>");
        //     }
        // }
        // else if(parseInt(maxQty) >= quantity){

        //     if ($("div").is("#notify")) {

        //         $('#notify').remove();

        //     }
        //     addtoCart(product_id,vendor_id,variation_id,quantity,price,v_p_id);
        // }
        if (price == '') {
            if($('#notify').length){


            }else{

                $(".ps-product__variations").prepend("<div id='notify' class='btn btn-danger'>Please! Select a variation.</div>");

            }

        }else{

            buyNow(product_id,vendor_id,variation_id,quantity,price,v_p_id);
        }

    });
function buyNow(product_id,vendor_id,variation_id,quantity,price,v_p_id){

    $.ajax({
           type:"POST",
           url:'{{ route('cart.products.buyNow') }}',
           data        :  {

                                      action       : 'add',
                                      product_id   :  product_id,
                                      variation_id : variation_id,
                                      vendor_id    :  vendor_id,
                                      quantity     :  quantity,
                                      price        :  price,
                                      v_p_id       :  v_p_id,
                                      _token       : $('input[name=_token').val()
                                    },
           success: function(data){

                window.location.href = "{{ url('checkout') }}";

           }

    });
}

// ======================================================================= //
// =============================| Other Offers |========================== //
// ======================================================================= //

function getOtherOffers(variation1,variation2,product_id,token){

    $.ajax({

            type : "POST",
            url  : '{{ Route('cart.products.getOtherOffers.post') }}',
            data : {

                    variation1 : variation1,
                    variation2 : variation2,
                    product_id : product_id,
                    _token     : $('input[name=_token').val()
            },
            success:function(data){

                if($('.widget.widget_same-brand').length){

                    $('.widget.widget_same-brand').remove();

                    $('.ps-page__right').append(data);

                }else{

                    $('.ps-page__right').append(data);
                }
            }
    });
}
//

function getsingleOffers(variation1,product_id,token){

    $.ajax({

            type : "POST",
            url  : '{{ Route('cart.products.getSingleOffers.post') }}',
            data : {

                    variation1 : variation1,
                    product_id : product_id,
                    _token     : $('input[name=_token]').val()
            },
            success:function(data){

                if($('.widget.widget_same-brand').length){

                    $('.widget.widget_same-brand').remove();

                    $('.ps-page__right').append(data);

                }else{

                    $('.ps-page__right').append(data);
                }
            }
    });
}

function cartActionButton(){
    let cart_v_p_id='{{array_key_exists($productData->v_p_id,(is_array(session()->get('cart',0)) ==0 ? [] : session('cart'))) ? $productData->v_p_id : 0}}'
    let v_p_id='{{$productData->v_p_id}}';
    if(v_p_id==cart_v_p_id){
        $('#cart').hide()
        $('#go_cart').show()
    }else{
        $('#cart').show()
        $('#go_cart').hide()
    }
}
    })

</script>
