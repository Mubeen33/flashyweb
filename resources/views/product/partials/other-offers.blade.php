@if(empty($productData->first_variation_value))
    @if(count($otherOffers)>0)
        <aside class="widget widget_same-brand">
                        <h3>Other Offers</h3>

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
