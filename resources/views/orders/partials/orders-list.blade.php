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
        {{$content->created_at->format(env('GENERAL_DATE_FORMAT_WITH_HI'))}}
    </td>
    <td>
        @if(intval($content->status) === 0)
            <span class="badge badge-danger">Pending</span>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="#">Show</a>
                    <a class="dropdown-item" href="#">Cancel</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>