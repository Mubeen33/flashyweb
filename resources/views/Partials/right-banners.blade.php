@if(!$banners->isEmpty())
@foreach($banners as $key=>$banner)
<a class="ps-collection" href="@if($banner->link != NULL){{$banner->link}}@endif">
    <img src="{{$banner->image_lg}}" alt="{{ $banner->title }}">
</a>
@endforeach
@endif