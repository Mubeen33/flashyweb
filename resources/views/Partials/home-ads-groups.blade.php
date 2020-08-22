<div class="ps-container">
    @if(!$ads_bannerGroups->isEmpty())
    <div class="row">
        @foreach($ads_bannerGroups as $key=>$ad_banner)
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
            <a class="ps-collection" href="@if($ad_banner->link != NULL){{$ad_banner->link}}@endif">
                <img src="{{ $ad_banner->image_lg }}" alt="{{ $ad_banner->title }}">
            </a>
        </div>
        @endforeach
    </div>
    @endif
</div>