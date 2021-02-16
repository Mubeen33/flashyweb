<link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
<style type="text/css">
	.category-nav-element{
		width: 100%;
	}
    ul.categories {
    padding: 0;
    margin: 0;
    list-style: none;
    }
        .sliderBtn{
        position: absolute;
                   top: 58%;
                   left: 58%;
                   transform: translate(-50%, -50%);
                   -ms-transform: translate(-50%, -50%);
                   background-color: #42c5e3;
                   color: white;
                   font-size: 16px;
                   padding: 6px 16px;
                   border: none;
                   cursor: pointer;
                   border-radius: 34px;
                   text-align: center;
                   font-weight: 1000;
    }
    .sliderTitle{
        position: absolute;
        top: 12%;
        left: 20%;           
        text-align: center;
       
    }
    .sliderDesc{
        position: absolute;
        top: 30%;
        left: 25%;           
        text-align: center;
       
    }
    
@keyframes fadeInUp {
    from {
        transform: translate3d(0,40px,0)
    }

    to {
        transform: translate3d(0,0,0);
        opacity: 1
    }
}

@-webkit-keyframes fadeInUp {
    from {
        transform: translate3d(0,40px,0)
    }

    to {
        transform: translate3d(0,0,0);
        opacity: 1
    }
}

.animated {
    animation-duration: 4s;
    animation-fill-mode: both;
    -webkit-animation-duration: 4s;
    -webkit-animation-fill-mode: both
}

.animatedFadeInUp {
    opacity: 0
}

.fadeInUp {
    opacity: 0;
    animation-name: fadeInUp;
    -webkit-animation-name: fadeInUp;
}
</style>
<div class="row no-gutters position-relative">
    <div class="col-lg-3 position-static order-2 order-lg-0">
        <div class="category-sidebar">
            <div class="all-category d-none d-lg-block">
                <span >Categories</span>
                <a href="">
                    <span class="d-none d-lg-inline-block">See All</span>
                </a>
            </div>
            @php
            //show_image_nav -for show on navigation
            $parent_categories = (\App\Models\Category::where([
            ['parent_id', '=', 0],
            ['show_image_nav', '=', 1],
            ['deleted', '=', 0]
            ])
            ->orderBy("category_order", 'ASC')
            ->get());
            @endphp
            @if(!$parent_categories->isEmpty())
            <ul class="categories no-scrollbar">
                <li class="d-lg-none">
                    <a href="" class="text-truncate">
                        <span class="cat-name">All <br> Categories</span>
                    </a>
                </li>
                @foreach($parent_categories as $key=>$menu)
                <li class="category-nav-element">
                    <a href="" class="text-truncate" style="display: block;">
                        <img class="cat-image lazyload" src="{{ $menu->icon }}" data-src="{{ $menu->icon }}" width="30" alt="">
                        <span class="cat-name"> {{ $menu->name }}</span>
                    </a>
                    @if(count($menu->childs) > 0)
                    <div class="sub-cat-menu c-scrollbar">
                        <div class="mega-menu" style="border:0px">
                            @include('Partials.menu.dv-child-categories', ['childs' => $menu->childs])
                        </div>
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> -->
            <div class="carousel-inner">
                @php
                $i = "active";
                @endphp
                @foreach(\App\Models\Slider::orderBy('order_no')->get() as $slider)
                <div class="carousel-item {{$i}}">
                  <img class="d-block w-100" src="{{$slider->image_lg}}" height="350px" alt="{{$slider->title}}">
                  @if(!empty($slider->button_text))
                  <a class="sliderBtn  {{($slider->button_animation) ? ' animated animatedFadeInUp fadeInUp' : ''}}" style="{{($slider->button_text_color) ? 'color: '.$slider->button_text_color.' !important;'  : 'white;'}} {{($slider->button_color) ? 'background-color: '.$slider->button_color.' !important;'  : 'white;'}}" href="{{(!empty($slider->link)) ? $slider->link : '#'}}" >{{$slider->button_text}}</a>
                    @endif
                     @if(!empty($slider->description))
                     <p class="sliderDesc {{($slider->description_animation) ? ' animated animatedFadeInUp fadeInUp' : ''}}" style="{{(!empty($slider->text_color)) ? 'color:'.$slider->text_color.'!important;': 'white'}}  ">{{$slider->description}}<p>
                    @endif
                     @if(!empty($slider->title))
                     <h1 class="sliderTitle  {{($slider->title_animation) ? ' animated animatedFadeInUp fadeInUp' : ''}}" style="{{(!empty($slider->text_color)) ? 'color:'.$slider->text_color.'!important;': 'white'}}  ">{{$slider->title}}<h1>
                    @endif
                </div>
                @php
                    $i = "";
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>