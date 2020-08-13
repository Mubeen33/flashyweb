@extends('../layouts.master')
@section('content')
    <main class="ps-page--my-account">
        <!-- <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>User Information</li>
                </ul>
            </div>
        </div> -->
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <!-- <div class="ps-section__left">
                            <aside class="ps-widget--account-dashboard">
                                <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
                                    <figure>
                                        <figcaption>Hello</figcaption>
                                        <p><a href="#">username@gmail.com</a></p>
                                    </figure>
                                </div>
                                <div class="ps-widget__content">
                                    <ul>
                                        <li class="active"><a href="#"><i class="icon-user"></i> Account Information</a></li>
                                        <li><a href="#"><i class="icon-alarm-ringing"></i> Notifications</a></li>
                                        <li><a href="#"><i class="icon-papers"></i> Invoices</a></li>
                                        <li><a href="#"><i class="icon-map-marker"></i> Address</a></li>
                                        <li><a href="#"><i class="icon-store"></i> Recent Viewed Product</a></li>
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-power-switch"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div> -->
                    </div>
                    <div class="col-lg-8">
                        @if(session('msg'))
                          {!! session('msg') !!}
                        @endif
                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="{{url('send-vendor-request')}}" method="post">
                                @csrf
                                <div class="ps-form__header">
                                    <h3>Vendor Information</h3>
                                </div><br>
                                <div class="ps-form__content">    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="first_name" placeholder="Please enter First Name..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="last_name" placeholder="Please enter your Last Name..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Please enter Email..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" type="text" name="phone" placeholder="Please enter your Phone Number..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile No</label>
                                                <input class="form-control" type="text" name="mobile" placeholder="Please enter your Mobile Number..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Business Information</label>
                                                <textarea class="form-control" required="" name="business_info"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Is VAT Registered</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input type="radio" name="vat_register" value="1">
                                                <label for="1">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <input type="radio" name="vat_register" value="0">
                                                <label for="0">No</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input class="form-control" type="text" name="company_name" placeholder="Please enter Company Name...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input class="form-control" type="text" name="website_url" placeholder="Please enter your Website...">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="ps-form__header">
                                                <h4>Business Director Information</h4>
                                            </div><br>
                                        </div>    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Director First Name</label>
                                                <input class="form-control" type="text" name="director_first_name" placeholder="Please enter Director First Name..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Director Last Name</label>
                                                <input class="form-control" type="text" name="director_last_name" placeholder="Please enter Director Last Name..." required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Director Email</label>
                                                <input class="form-control" type="email" name="director_email" placeholder="Please enter Director Email...">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Business Additional Information</label>
                                                <textarea class="form-control" name="additional_info"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button class="ps-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
<script type="text/javascript">
    setTimeout(function() {
        $('#msg').fadeOut('fast');
    }, 5000);
</script>