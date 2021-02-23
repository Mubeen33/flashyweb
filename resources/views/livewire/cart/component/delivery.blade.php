
<div  x-show.transition.in="open=='delivery'">
    <table class="table ps-table--shopping-cart">
        {{--<table class="table ps-table--shopping-cart">--}}
        <thead>

        <tr>
            <th>Address</th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td>
                <div class="ps-product--cart">
                    <div class="ps-product__thumbnail"><a href="product-default.html">
                            <img src="http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg" alt=""></a></div>
                    <div class="ps-product__content">
{{--                        <Strong>--}}
{{--                            <h3>--}}
{{--                                Delivery--}}
{{--                            </h3>--}}
{{--                        </Strong>--}}
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </td>
            <td class="price text-center">
                <div class="ps-section__cart-actions pt-0 pb-3 float-right">
                    <a href="#" class="ps-btn" wire:click="deliveryType('address','delivery')">
                        Deliver My Order
                    </a>
                </div>
            </td>

        </tr>
        <tr>
            <td>
                <div class="ps-product--cart">
                    <div class="ps-product__thumbnail"><a href="product-default.html">
                            <img src="https://seller.mejensi.com/product_images/5f625a3033f691_300_22-100x100.png" alt=""></a></div>
                    <div class="ps-product__content">
                        <Strong>
                            <h3>
                                {{--                            Collect {{$testF}}--}}
                            </h3>
                        </Strong>

                        <p>
                            Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </td>
            <td class="price text-center">
                <div class="ps-section__cart-actions pt-0 pb-3 float-right">
                    <a href="#" class="ps-btn" wire:click="deliveryType('address','pickUp')">
                        Collect My Order
                    </a>
                </div>
            </td>

        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>

        </tbody>
    </table>
    @include('.livewire/cart/component/footer',['action'=>'address'])
</div>

