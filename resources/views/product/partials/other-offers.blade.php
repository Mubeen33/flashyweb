@if(empty($productData->first_variation_value))
    @if(count($otherOffers)>0)
        <aside class="widget widget_same-brand">
                        <h3>Other Offers</h3>
                        {{-- <div class="widget__content"> --}}
                           {{--  <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                    <div class="ps-product__badge">-37%</div>
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                        <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                    @foreach($otherOffers as $otheroffer)    
                        <div class="col-md-12">
                            <h4><b>R {{ $otheroffer->price }}</b><button class="btn btn-warning" id="otherOffer" onclick="addtoCart({{ $otheroffer->prod_id }},{{ $otheroffer->ven_id }},null,1,{{ $otheroffer->price }},{{ $otheroffer->id }})">Add to Cart</button></h4>
                            <p>Ships in {{ $otheroffer->dispatched_days }} work days</p>
                            @php
                                $vendorName = (App\Models\Vendor::where('id',$otheroffer->ven_id)->value('company_name'));
                            @endphp
                            <h5><a href="#">{{ $vendorName }}</a></h5>
                            @if(count($otherOffers)>1)
                                <hr>
                            @endif    
                        </div>
                     @endforeach   
                    </aside>
    @endif                
@endif                    