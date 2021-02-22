@foreach(\App\Models\HomeCategory::where('status' , 1)->get() as $key => $home_category)
    @if ($home_category->category != null)
        <div class="ps-product-list ps-clothings">
            <div class="ps-container">
                <div class="ps-section__header">
                    <h3>{{$home_category->category->name}}</h3>
                    <ul class="ps-section__links">
                        <li><a href="shop-grid.html">New Arrivals</a></li>
                        <li><a href="shop-grid.html">Best seller</a></li>
                        <li><a href="shop-grid.html">Must Popular</a></li>
                        <li><a href="shop-grid.html">View All</a></li>
                    </ul>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                        @php
                            $products = \App\Models\Product::where('category_id' , $home_category->category->id)->get();
                        @endphp
                        @foreach($products as $product)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/1.jpg" alt=""></a>
                                    <div class="ps-product__badge">-16%</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$product->title}}</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">{{$product->title}}</a>
                                        <p class="ps-product__price sale">$567.99 <del>$670.00 </del></p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/2.jpg" alt=""></a>
                                <div class="ps-product__badge hot">hot</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$101.99</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                    <p class="ps-product__price">$101.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/3.jpg" alt=""></a>
                                <div class="ps-product__badge">-25%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/4.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$320.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung Gear VR Virtual Reality Headset</a>
                                    <p class="ps-product__price">$320.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/5.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Office</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$85.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Samsung UHD TV 24inch</a>
                                    <p class="ps-product__price">$85.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/6.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Global Store</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price">$92.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">EPSION Plaster Printer</a>
                                    <p class="ps-product__price">$92.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/7.jpg" alt=""></a>
                                <div class="ps-product__badge">-46%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Young Shop</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">LG White Front Load Steam Washer</a>
                                    <p class="ps-product__price sale">$42.00 <del>$60.00 </del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/8.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Edifier Powered Bookshelf Speakers</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Edifier Powered Bookshelf Speakers</a>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/9.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/electronic/10.jpg" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Go Pro</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>02</span>
                                    </div>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Amcrest Security Camera in White Color</a>
                                    <p class="ps-product__price">$42.00</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach



{{--<div class="ps-deal-of-day">--}}
{{--    <div class="ps-container">--}}
{{--        <div class="ps-section__header">--}}
{{--            <div class="ps-block--countdown-deal">--}}
{{--                <div class="ps-block__left">--}}
{{--                    <h3>Deals of the day</h3>--}}
{{--                </div>--}}
{{--                <div class="ps-block__right">--}}
{{--                    <figure>--}}
{{--                        <figcaption>End in:</figcaption>--}}
{{--                        <ul class="ps-countdown" data-time="July 21, 2020 15:37:25">--}}
{{--                            <li><span class="days">-215</span></li>--}}
{{--                            <li><span class="hours">-8</span></li>--}}
{{--                            <li><span class="minutes">-53</span></li>--}}
{{--                            <li><span class="seconds">-43</span></li>--}}
{{--                        </ul>--}}
{{--                    </figure>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a href="#">View all</a>--}}
{{--        </div>--}}
{{--        <div class="ps-section__content">--}}
{{--            <div class="ps-carousel--nav owl-slider owl-carousel owl-theme owl-loaded" data-owl-auto="false"--}}
{{--                 data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true"--}}
{{--                 data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5"--}}
{{--                 data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">--}}


{{--                <div class="owl-stage-outer">--}}
{{--                    <div class="owl-stage"--}}
{{--                         style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1446.2px;">--}}
{{--                        <div class="owl-item active" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/1.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-16%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$567.99--}}
{{--                                        <del>$670.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Korea Long Sofa--}}
{{--                                            Fabric In Blue Navy Color</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="94">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 94%;"></span></div>--}}
{{--                                            <p>Sold:16</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item active" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/2.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price">$101.99<small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Aroma Rice--}}
{{--                                            Cooker</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="64">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 64%;"></span></div>--}}
{{--                                            <p>Sold:99</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item active" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/3.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-25%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Simple Plastice--}}
{{--                                            Chair In White Color</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="9">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 9%;"></span></div>--}}
{{--                                            <p>Sold:96</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item active" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/4.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price">$320.00<small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Korea Fabric Chair--}}
{{--                                            In Brown Colorr</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="22">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 22%;"></span></div>--}}
{{--                                            <p>Sold:87</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item active" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/5.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price">$85.00<small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Set 14-Piece Knife--}}
{{--                                            From KichiKit</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="80">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 80%;"></span></div>--}}
{{--                                            <p>Sold:1</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/6.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge out-stock">Out Of Stock</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price">$92.00<small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Magic Bullet--}}
{{--                                            NutriBullet Pro 900 Series Blender</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>01</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="77">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 77%;"></span></div>--}}
{{--                                            <p>Sold:57</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="owl-item" style="width: 176.6px; margin-right: 30px;">--}}
{{--                            <div class="ps-product ps-product--inner">--}}
{{--                                <div class="ps-product__thumbnail"><a href="product-default.html"><img--}}
{{--                                            src="img/products/home/7.jpg" alt=""></a>--}}
{{--                                    <div class="ps-product__badge">-46%</div>--}}
{{--                                    <ul class="ps-product__actions">--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Read More"><i class="icon-bag2"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Quick View"><i class="icon-eye"></i></a></li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Add to Whishlist"><i class="icon-heart"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title=""--}}
{{--                                               data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="ps-product__container">--}}
{{--                                    <p class="ps-product__price sale">$42.00--}}
{{--                                        <del>$60.00</del>--}}
{{--                                        <small>18% off</small></p>--}}
{{--                                    <div class="ps-product__content"><a class="ps-product__title"--}}
{{--                                                                        href="product-default.html">Letter Printed--}}
{{--                                            Cushion Cover Cotton</a>--}}
{{--                                        <div class="ps-product__rating">--}}
{{--                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating"--}}
{{--                                                                                                       data-read-only="true"--}}
{{--                                                                                                       style="display: none;">--}}
{{--                                                    <option value="1">1</option>--}}
{{--                                                    <option value="1">2</option>--}}
{{--                                                    <option value="1">3</option>--}}
{{--                                                    <option value="1">4</option>--}}
{{--                                                    <option value="2">5</option>--}}
{{--                                                </select>--}}
{{--                                                <div class="br-widget br-readonly"><a href="#" data-rating-value="1"--}}
{{--                                                                                      data-rating-text="1"--}}
{{--                                                                                      class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="2"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="1"--}}
{{--                                                                                              data-rating-text="3"--}}
{{--                                                                                              class="br-selected br-current"></a><a--}}
{{--                                                        href="#" data-rating-value="1" data-rating-text="4"--}}
{{--                                                        class="br-selected br-current"></a><a href="#"--}}
{{--                                                                                              data-rating-value="2"--}}
{{--                                                                                              data-rating-text="5"></a>--}}
{{--                                                    <div class="br-current-rating">1</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <span>02</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="ps-product__progress-bar ps-progress" data-value="41">--}}
{{--                                            <div class="ps-progress__value"><span style="width: 41%;"></span></div>--}}
{{--                                            <p>Sold:32</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="owl-controls">--}}
{{--                    <div class="owl-nav">--}}
{{--                        <div class="owl-prev" style=""><i class="icon-chevron-left"></i></div>--}}
{{--                        <div class="owl-next" style=""><i class="icon-chevron-right"></i></div>--}}
{{--                    </div>--}}
{{--                    <div class="owl-dots" style="">--}}
{{--                        <div class="owl-dot active"><span></span></div>--}}
{{--                        <div class="owl-dot"><span></span></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
