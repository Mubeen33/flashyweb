
    
    <div class="mega-menu__column">
        @foreach($childs as $key=>$child)
            @if($key == 0)
            <h4>{{ $child->name }}<span class="sub-toggle"></span></h4>
            @endif
        @endforeach

        <ul class="mega-menu__list">
            @foreach($childs as $key=>$child)
                <li class="current-menu-item "><a href="#">{{ $child->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    @foreach($childs as $key=>$child)
        @if(count($child->childs) > 0)
            @include('Partials.menu.dv-child-categories', ['childs' => $child->childs])
        @endif
    @endforeach
    