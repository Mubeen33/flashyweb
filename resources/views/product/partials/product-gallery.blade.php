@php
    $get_product_images = (\App\Models\ProductMedia::where('image_id', $product->get_product->image_id)->get());
@endphp

@if(!$get_product_images->isEmpty())
<figure>
    <div class="ps-wrapper">
        <div class="ps-product__gallery" data-arrow="true">
            @foreach($get_product_images as $key=>$image)
            <div class="item">
                <a href="{{$image->image}}">
                    <img src="{{$image->image}}" alt="{{$product->get_product->title}}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</figure>

<div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
    @foreach($get_product_images as $key=>$image)
    <div class="item">
        <img src="{{$image->image}}" alt="{{$product->get_product->title}}">
    </div>
    @endforeach
</div>
@endif



{{--  
sample image directory 
=======================================
"/img/products/detail/fullwidth/1.jpg"


sample structure
========================================
<div class="item">
    <a href="/img/products/detail/fullwidth/2.jpg">
        <img src="/img/products/detail/fullwidth/2.jpg" alt="">
    </a>
</div>

==============================
sample variant
<div class="item">
    <img src="/img/products/detail/fullwidth/1.jpg" alt="">
</div>

--}}