<style>
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
<div id="home-slider--dv">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        
        @if(!$sliders->isEmpty())
            @foreach($sliders as $key=>$slider)
                <div class="ps-banner ">
                   <img src="{{ $slider->image_lg }}" alt="{{ $slider->image_lg }}" >
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
            @endforeach
        @endif

    </div>
</div>



<!-- mobile slider -->
{{-- <div id="home-slider-mv">
    <div class="ps-carousel-nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        
        @if(!$sliders->isEmpty())
            @foreach($sliders as $key=>$slider)
            
                <div class="ps-banner">
                    <a href="#">
                        <img src="{{ $slider->image_sm }}" alt="{{ $slider->title }}">
                    </a>
                    <div class="slider-caption">
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
                    </div>
                </div>
                    
            @endforeach
        @endif
    </div>
</div> --}}



