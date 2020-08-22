<div class="ps-container">
    <div class="row">
    	@if($ads_bannerLong)
	        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
	        	<a class="ps-collection" href="@if($ads_bannerLong->link != NULL){{$ads_bannerLong->link}}@endif">
	        		<img src="{{ $ads_bannerLong->image_lg }}" alt="{{ $ads_bannerLong->title }}">
	        	</a>
	        </div>
        @endif

        @if($ads_bannerShort)
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
        	<a class="ps-collection" href="@if($ads_bannerShort->link != NULL){{$ads_bannerShort->link}}@endif">
        		<img src="{{ $ads_bannerShort->image_lg }}" alt="{{ $ads_bannerShort->title }}">
        	</a>
        </div>
        @endif
    </div>
</div>