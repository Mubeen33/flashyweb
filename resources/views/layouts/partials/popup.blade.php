@php
    $get_popup_dont_show_session = \Session::get('dont_show_popup');
@endphp


@if(!$get_popup_dont_show_session)

    @php
        $current_ = \Carbon\Carbon::now();
        $today_ =$current_->format('Y-m-d');

        $get_popups_data = (\App\Models\Popup::whereDate('start_time', '<=', $today_)
                        ->whereDate('end_time', '>=', $today_)
                        ->get()
                    );

        $current_active_url = Request::url();
        $popupID = NULL;
        foreach($get_popups_data as $content){
        $url_array = (array_map('trim',array_filter(explode("##,", $content->url_list))));
            if(in_array($current_active_url , $url_array)){
                $popupID = $content->id;
                break;
            }
        }
        
        
        
       
    @endphp




    @if($popupID != NULL)
        @foreach($get_popups_data as $key=>$content)
            @if($content->id == $popupID)
            <div class="ps-popup" id="subscribe" data-time="500">
                <div class="ps-popup__content bg--cover" data-background="{{ $content->popup_background_image }}"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
                    <div class="ps-form--subscribe-popup">
                        <div class="ps-form__content">
                            <h4>{{ $content->title }}</h4>
                            <p>{{ $content->description }}</p>

                            @if($content->button_text != NULL)
                            <div class="form-group">
                                <a href="@if($content->button_link != NULL){{$content->button_link}} @else # @endif" class="ps-btn" style="background: {{$content->button_background}};color: {{$content->button_text_color}}">{{ $content->button_text }}</a>
                            </div>
                            @endif

                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="dontShowPopUp" name="not-show">
                                <label for="dontShowPopUp">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                @push('scripts')
                <script>
                    $("#dontShowPopUp").on("click", function(){
                        let token = $('meta[name="csrf-token"]').attr('content')
                        $.ajax({
                            url:"{{route('popUpDontShow.post')}}",
                            method:'POST',
                            data:{_token:token},
                            dataType:'JSON',
                            success:function(response){
                                if (response.success === true) {
                                    console.log(response.msg)
                                    $("#subscribe").removeClass('active')
                                }else{
                                    console.log(response.msg)
                                    alert('SORRY - Someting Went Wrong.')
                                    window.location.reload(true)
                                }
                                
                            }
                        })
                    })
                </script>
                @endpush

            @endif
        @endforeach
    @endif

@endif