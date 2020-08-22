<div class="ps-container">
    @if(!$ads_banners->isEmpty())
    <div class="row">
        @foreach($ads_banners as $key=>$ads_banner)
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
            <a class="ps-collection" href="@if($ads_banner->link != NULL){{$ads_banner->link}}@endif">
                <img src="{{ $ads_banner->image_lg }}" alt="{{ $ads_banner->title }}">
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>