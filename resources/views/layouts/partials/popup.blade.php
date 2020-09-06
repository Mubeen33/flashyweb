@php
    $current_ = \Carbon\Carbon::now();
    $today_ =$current_->format('Y-m-d');

    $get_popups_data = (\App\Models\Popup::whereDate('start_time', '<=', $today_)
                    ->whereDate('end_time', '>=', $today_)
                    ->get()
                );
    $url__list = NULL;
    foreach($get_popups_data as $content){
        $url__list .= "##,".$content->url_list;
    }
    $current_active_url = Request::url();
    if($url__list != NULL){
        $url_array = (array_map('trim',array_filter(explode("##,", $url__list))));
        var_dump($url_array);
        print_r($url_array);
        echo $current_active_url;
        if(in_array($current_active_url , $url_array)){
            
        }
    }
    
   
@endphp

<div class="ps-popup" id="subscribe" data-time="500">
    <div class="ps-popup__content bg--cover" data-background="img/bg/subscribe.jpg"><a class="ps-popup__close" href="#"><i class="icon-cross"></i></a>
        <form class="ps-form--subscribe-popup" action="index.html" method="get">
            <div class="ps-form__content">
                <h4>Get <strong>25%</strong> Discount</h4>
                <p>Subscribe to the Martfury mailing list <br /> to receive updates on new arrivals, special offers <br /> and our promotions.</p>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Email Address" required>
                    <button class="ps-btn">Subscribe</button>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="not-show" name="not-show">
                    <label for="not-show">Don't show this popup again</label>
                </div>
            </div>
        </form>
    </div>
</div>