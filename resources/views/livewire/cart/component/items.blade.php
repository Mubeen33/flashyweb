<div x-show.transition.in="open=='items'">
    <div class="ps-table--shopping-cart">

        <div class="ps-top-categories">
            <div class="ps-container">
                <h3>Items For Delivery</h3>
                <div class="row">

                    @for($i=1;$i<17;$i++)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                            <div class="ps-block--category"><a class="ps-block__overlay" href="shop-default.html"></a><img src="img/categories/1.jpg" alt="">
                                <p>Electronics</p>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>


    </div>
    <div class="ps-section__content">
        <div class="table-responsive">


            <table class="table ps-table--shopping-cart">
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
        </div>
    </div>
    @include('.livewire/cart/component/footer',['action'=>'payment'])

</div>
