@php
    $where = [
        'show_on_homepage'=>1,
        'deleted'=>0
    ];
    $homeCategories = (\App\Models\Category::where([
                                ['show_on_homepage', '=', 1],
                                ['deleted', '=', 0]
                            ])
                            ->orderBy("category_order", 'ASC')
                            ->get());
@endphp

@if(!$homeCategories->isEmpty())
    @foreach($homeCategories as $key=>$menu)
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
        <div class="ps-block--category">
            <a class="ps-block__overlay" href=""></a>
            <img src="{{ $menu->image }}" alt="{{ $menu->title_meta_tag }}">
            <p>{{ $menu->name }}</p>
        </div>
    </div>
    @endforeach
@endif