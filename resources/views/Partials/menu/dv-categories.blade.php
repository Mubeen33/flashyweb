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



<div class="menu--product-categories">
    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
    <div class="menu__content">

    @if(!$parent_categories->isEmpty())
        <ul class="menu--dropdown">
            @foreach($parent_categories as $key=>$menu)
            <li class="current-menu-item @if(count($menu->childs) > 0) menu-item-has-children has-mega-menu @endif">
                <a href="#"><img src="{{ $menu->image }}" style='margin-right:15px;width: 20px;height:20px'> {{ $menu->name }}</a>
                
                @if(count($menu->childs) > 0)
                <div class="mega-menu">
                    @include('Partials.menu.dv-child-categories', ['childs' => $menu->childs])
                </div>
                @endif
                
            </li>
            @endforeach
        </ul>
    @endif

    </div>
</div>
