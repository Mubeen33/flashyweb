@extends('layouts.master')

@push('styles')
    <style>
        .label_heading label{
            font-size:18px;
        }
        .radio_container {
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 22px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        .radio_container .label_tx{
          font-size:18px;
        }
        
        /* Hide the browser's default radio button */
        .radio_container input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
        }
        
        /* Create a custom radio button */
        .radio_container .checkmark {
          position: absolute;
          top: 4px;
          left: 0;
          height: 25px;
          width: 25px;
          background-color: #eee;
          border-radius: 50%;
        }
        
        /* On mouse-over, add a grey background color */
        .radio_container:hover input ~ .checkmark {
          background-color: #ccc;
        }
        
        /* When the radio button is checked, add a blue background */
        .radio_container input:checked ~ .checkmark {
          background-color: #2196F3;
        }
        
        /* Create the indicator (the dot/circle - hidden when not checked) */
        .radio_container .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }
        
        /* Show the indicator (dot/circle) when checked */
        .radio_container input:checked ~ .checkmark:after {
          display: block;
        }
        
        /* Style the indicator (dot/circle) */
        .radio_container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>
  @endpush

@section('content')
    
<div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Vendor Registration</li>
                </ul>
            </div>
        </div>
        
        
        <div class="ps-section--vendor ps-vendor-milestone">
            <div class="container">
                <div class="ps-section__header">
                    <p>Vendor Registration</p>
                    <h4>Become a seller on Flushybuy.com</h4>
                    <p>Complete the form below and we'll be in touch with you</p>
                </div>
                <div class="ps-section__content">
                    @include('msg.msg')
                    <form class="ps-form--contact-us" action="{{ route('frontend.vendor.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <input name="first_name" class="form-control" type="text" placeholder="First name *" value="{{ old('first_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <input name="last_name" class="form-control" type="text" placeholder="Last name *" value="{{ old('last_name') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="email" class="form-control" type="text" placeholder="Email *" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="phone" class="form-control" type="text" placeholder="Phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="mobile" class="form-control" type="text" placeholder="Mobile *" value="{{ old('mobile') }}">
                                </div>
                            </div>
                            
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="company_name" class="form-control" type="text" placeholder="Company name *" value="{{ old('company_name') }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <div class='label_heading'>
                                        <label>Vat Registered?</label>
                                    </div>
                                    <div class='radio--btns'>
                                        <label class="radio_container"><span class='label_tx'>Yes</span>
                                          <input name="is_vat_registered" type="radio" checked="checked" value="Yes">
                                          <span class="checkmark"></span>
                                        </label>
                                        <label class="radio_container"><span class='label_tx'>No</span>
                                          <input name="is_vat_registered" type="radio" value="No">
                                          <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="website" class="form-control" type="text" placeholder="Website" value="{{ old('website') }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="business_director_details" class="form-control" type="text" placeholder="Business director details" value="{{ old('business_director_details') }}">
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <input name="business_owner_first_name" class="form-control" type="text" placeholder="Business owner first name" value="{{ old('business_owner_first_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                            <div class="form-group">
                                                <input name="business_owner_last_name" class="form-control" type="text" placeholder="Business owner last name" value="{{ old('business_owner_last_name') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input name="business_owner_email" class="form-control" type="text" placeholder="Business owner email address" value="{{ old('business_owner_email') }}">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <textarea name="business_additional_info" class="form-control" rows="5" placeholder="Additional information about your business">{{ old('business_additional_info') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <button class="ps-btn text-uppercase" type='submit'>Apply to Sell</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="ps-section--vendor ps-vendor-about">
            <div class="container">
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="/img/icons/vendor-1.png" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>Low Fees</h4>
                                    <div class="ps-block__desc" data-mh="about-desc">
                                        <p>It doesn’t take much to list your items and once you make a sale, Martfury’s transaction fee is just 2.5%.</p>
                                    </div><a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="/img/icons/vendor-2.png" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>Powerful Tools</h4>
                                    <div class="ps-block__desc" data-mh="about-desc">
                                        <p>Our tools and services make it easy to manage, promote and grow your business.</p>
                                    </div><a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="/img/icons/vendor-3.png" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>Support 24/7</h4>
                                    <div class="ps-block__desc" data-mh="about-desc">
                                        <p>Our tools and services make it easy to manage, promote and grow your business.</p>
                                    </div><a href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ps-section--vendor ps-vendor-testimonials">
            <div class="container">
                <div class="ps-section__header">
                    <p>SELLER STORIES</p>
                    <h4>See Seller share about their successful on Martfury</h4>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="2" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="2" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="/img/users/1.jpg" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>Kanye West<span>Head Chef at BBQ Restaurant</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="/img/users/2.png" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>Anabella Kleva<span>Boss at TocoToco</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                        <div class="ps-block--testimonial">
                            <div class="ps-block__header"><img src="/img/users/3.jpg" alt=""></div>
                            <div class="ps-block__content"><i class="icon-quote-close"></i>
                                <h4>William Roles<span>Head Chef at BBQ Restaurant</span></h4>
                                <p>Sed elit quam, iaculis sed semper sit amet udin vitae nibh. at magna akal semperFusce commodo molestie luctus.Lorem ipsum Dolor tusima olatiup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection    