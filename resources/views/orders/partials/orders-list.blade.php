@foreach($data as $key=>$content)
<tr>
    <td>{{ $content->order_id }}</td>
    <td>
        {{ $content->get_vendor->first_name }} {{ $content->get_vendor->last_name }}
    </td>
    <td>
        <?php
            $vendor_product = (\App\Models\VendorProduct::where('id', $content->get_vendor_product->id)->first());
            $product = (\App\Models\Product::where('id', $content->get_vendor_product->prod_id)->with(['get_category', 'get_images'])->first());
            if ($product) {
                //get product
                echo $product->title;
            }
        ?>
    </td>
    <td>
        @if($product)
            {{$product->get_category->name}}
        @endif
    </td>
    <td>
        @if($vendor_product)
            {{$vendor_product->price}}
        @endif
    </td>
    <td>
        @if($product && count($product->get_images) > 0)
            @foreach($product->get_images as $key_img=>$image)
                <?php
                    if ($key_img == 0) {
                        echo "<img src='".$image->image."' width='70px' height='40px'>";
                        break;
                    }
                ?>
            @endforeach
        @endif
    </td>
    <td>
        {{$content->qty}}
    </td>
    <td>
        {{env('PRICE_SYMBOL').$content->grand_total}}
    </td>
    <td>
        {{$content->payment_option}}
    </td>
    <td>
        {{$content->created_at->format(env('GENERAL_DATE_FORMAT_WITH_HI'))}}
    </td>
    <td>
        <span class="badge badge-info">{{$content->status}}</span>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="11">{!! $data->links() !!}</td>
</tr>