@if(!$get_home_banners->isEmpty())
@foreach($get_home_banners as $key=>$banner)
    @if($banner->type === "Banner_Box")
        
        @if($banner->secondary_image !== NULL && (date("Y-m-d H:i", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:i", strtotime($banner->secondary_end_time)) >= $current__time))
        <div class="ps-block__thumbnail">
            <a href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
                <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
            </a>
        </div>
        @else
        <div class="ps-block__thumbnail">
            <a href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
                <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
            </a>
        </div>
        @endif

    @endif
@endforeach
@endif