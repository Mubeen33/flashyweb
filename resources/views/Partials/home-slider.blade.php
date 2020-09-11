<div id="home-slider--dv">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        
        @if(!$sliders->isEmpty())
            @foreach($sliders as $key=>$slider)
            {{$slider->image_lg}}
            <div class="ps-banner">
                <a href="#">
                    <img src="{{ $slider->image_lg }}" alt="{{ $slider->title }}">
                </a>
                {{--<div class="slider-caption">
                    <h4 style="color:{{$slider->text_color}};">{{ $slider->title }}</h4>
                    <p style="color:{{$slider->text_color}};">{{ $slider->description }}</p>
                    
                    <a href="{{ $slider->link }}" class="btn text-uppercase"
                        style="
                            background-color:{{$slider->button_color}};
                            color:{{$slider->button_text_color}};
                        "
                    >
                        {{ $slider->button_text }}
                    </a>
                </div>--}}
            </div>
            @endforeach
        @endif

    </div>
</div>



<!-- mobile slider -->
<div id="home-slider--mv">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        
        @if(!$sliders->isEmpty())
            @foreach($sliders as $key=>$slider)
            
                <div class="ps-banner">
                    <a href="#">
                        <img src="{{ $slider->image_sm }}" alt="{{ $slider->title }}">
                    </a>
                    {{-- <div class="slider-caption">
                        <h4 style="color:{{$slider->text_color}};">{{ $slider->title }}</h4>
                        <p style="color:{{$slider->text_color}};">{{ $slider->description }}</p>
                        
                        <a href="{{ $slider->link }}" class="btn text-uppercase"
                            style="
                                background-color:{{$slider->button_color}};
                                color:{{$slider->button_text_color}};
                            "
                        >
                            {{ $slider->button_text }}
                        </a>
                    </div> --}}
                </div>
                    
            @endforeach
        @endif
    </div>
</div>



