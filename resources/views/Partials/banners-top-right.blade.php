@if(!$get_home_banners->isEmpty())
@foreach($get_home_banners as $key=>$banner)
	@if($banner->type === "Banners_Top_Right")
		
		@if(intval($banner->order_no) === 1)
			@if($banner->secondary_image !== NULL && (date("Y-m-d H:i", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:i", strtotime($banner->secondary_end_time)) >= $current__time))
				<a class="ps-collection" href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
				    <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
				</a>
				@else
				<a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
				    <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
				</a>
			@endif
		@endif


		@if(intval($banner->order_no) === 2)
			@if($banner->secondary_image !== NULL && (date("Y-m-d H:i", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:i", strtotime($banner->secondary_end_time)) >= $current__time))
				<a class="ps-collection" href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
				    <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
				</a>
				@else
				<a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
				    <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
				</a>
			@endif
		@endif

		@if(intval($banner->order_no) === 3)
			@if($banner->secondary_image !== NULL && (date("Y-m-d H:i", strtotime($banner->secondary_start_time)) <= $current__time) && (date("Y-m-d H:i", strtotime($banner->secondary_end_time)) >= $current__time))
				<a class="ps-collection" href="@if($banner->secondary_link != NULL){{$banner->secondary_link}}@else{{'#'}}@endif">
				    <img src="{{$banner->secondary_image}}" alt="{{ $banner->secondary_title }}">
				</a>
				@else
				<a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@else{{'#'}}@endif">
				    <img src="{{$banner->primary_image}}" alt="{{ $banner->title }}">
				</a>
			@endif
		@endif


	@endif
@endforeach
@endif