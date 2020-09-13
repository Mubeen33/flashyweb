@if(!$related_products->isEmpty())
   @foreach($related_products as $key=>$r_product)
      <?php
         $get_rp_image_thumb = (\App\Models\ProductMedia::where('image_id', $r_product->get_product->image_id)->first());
      ?>
      <div class="ps-product">
         <div class="ps-product__thumbnail">
            <a href="product-default.html">
               @if($get_rp_image_thumb)
               <img src="{{$get_rp_image_thumb->image}}" alt="">
               @endif
            </a>
            <ul class="ps-product__actions">
               <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
               <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
               <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
               <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
            </ul>
         </div>
         <div class="ps-product__container">
            <a class="ps-product__vendor" href="#">{{$r_product->get_vendor->company_name}}</a>
            <div class="ps-product__content">
               <a class="ps-product__title" href="product-default.html">{{$r_product->get_product->title}}</a>
               <div class="ps-product__rating">
                  <select class="ps-rating" data-read-only="true">
                     <option value="1">1</option>
                     <option value="1">2</option>
                     <option value="1">3</option>
                     <option value="1">4</option>
                     <option value="2">5</option>
                  </select>
                  <span>01</span>
               </div>
               <p class="ps-product__price">{{env('PRICE_SYMBOL').$r_product->min_price}}</p>
            </div>
            <div class="ps-product__content hover">
               <a class="ps-product__title" href="product-default.html">{{$r_product->get_product->title}}</a>
               <p class="ps-product__price">{{env('PRICE_SYMBOL').$r_product->min_price}}</p>
            </div>
         </div>
      </div>
   @endforeach
@endif