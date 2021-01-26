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
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{url('upload-images\sliders\slider1.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('upload-images\sliders\slider1.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                      <img class="d-block w-100" src="{{url('upload-images\sliders\slider1.png')}}" alt="Third slide">
                </div>
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