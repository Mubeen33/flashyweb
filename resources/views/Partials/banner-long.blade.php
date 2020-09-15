@if(!$get_home_banners->isEmpty())
<div class="ps-container">
    <div class="row">
        @foreach($get_home_banners as $key=>$banner)
        	@if($banner->type === "Banner_Long")
    	        
                @if($banner->secondary_image != NULL && (date("Y-m-d H:m", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:m", strtotime($banner->secondary_end_time)) >= $current__time))
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <a class="ps-collection" href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
                        <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
                    </a>
                </div>
                @else
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                    <a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
                        <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
                    </a>
                </div>
                @endif

            @endif
        @endforeach


        @foreach($get_home_banners as $key=>$banner)
            @if($banner->type === "Banner_Short")
                
                @if($banner->secondary_image != NULL && (date("Y-m-d H:m", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:m", strtotime($banner->secondary_end_time)) >= $current__time))
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                    <a class="ps-collection" href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
                        <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
                    </a>
                </div>
                @else
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                    <a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
                        <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
                    </a>
                </div>
                @endif

            @endif
        @endforeach


    </div>
</div>
@endif