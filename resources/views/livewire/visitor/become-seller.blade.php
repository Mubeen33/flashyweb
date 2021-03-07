<div class="ps-page--single">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.rootPage') }}">Home</a></li>
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


{{--                <form id="vendor-registraton-form" class="ps-form--contact-us" action="{{ route('frontend.vendor.store') }}" method="POST">--}}

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <input
                                                wire:model="first_name"
                                                class="form-control @error('first_name') border-danger @enderror"
                                                type="text"
                                                placeholder="First name *">
                                            <small class="text-danger error-lablel" id="error-label-first_name">
                                                @error('first_name') {{$message}} @enderror
                                            </small>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <input
                                                wire:model="last_name"
                                                class="form-control @error('last_name') border-danger @enderror"
                                                type="text"
                                                placeholder="Last name *">
                                            <small class="text-danger error-lablel" >
                                                @error('last_name') {{$message}} @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="email"
                                    class="form-control @error('email') border-danger @enderror"
                                    name="email"
                                    type="text"
                                    placeholder="Email *">
                                <small class="text-danger error-lablel" >
                                    @error('email') {{$message}} @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="phone"
                                    class="form-control @error('phone') border-danger @enderror"
                                    type="text"
                                    placeholder="Phone">
                                <small class="text-danger error-lablel" >
                                    @error('phone') {{$message}} @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group" >
                              <div wire:ignore>
                                  <input
                                      wire:model="mobile"
                                      class="form-control @error('mobile') border-danger @enderror"
                                      id="telephone"
                                      type="tel">
                              </div>
                                <small class="text-danger error-lablel" >
                                    @error('mobile') {{$message}} @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="company_name"
                                    class="form-control @error('company_name') border-danger @enderror"
                                    type="text"
                                    placeholder="Company name *">

                                <small class="text-danger error-lablel" >
                                    @error('company_name') {{$message}} @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <div class='label_heading'>
                                    <label>Vat Registered?</label>
                                </div>
                                <div class='radio--btns'>
                                    <div>
                                        <label class="radio_container"><span class='label_tx'>Yes</span>
                                            <input
                                                wire:model="vat_register"
                                                type="radio"
                                                value="Yes">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio_container"><span class='label_tx'>No</span>
                                            <input
                                                wire:model="vat_register"
                                                type="radio"
                                                value="No">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <small class="text-danger error-lablel" >
                                        @error('vat_register') {{$message}} @enderror
                                    </small>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="website_url"
                                    class="form-control @error('website_url') border-danger @enderror"
                                    type="text"
                                    placeholder="Website">

                                <small class="text-danger error-lablel" >
                                    @error('website_url') {{$message}} @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <input
                                                wire:model="director_first_name"
                                                class="form-control @error('director_first_name') border-danger @enderror"
                                                type="text"
                                                placeholder="Business director first name">
                                            <small class="text-danger error-lablel" >
                                                @error('director_first_name') {{$message}} @enderror
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-group">
                                            <input
                                                wire:model="director_last_name"
                                                class="form-control @error('director_last_name') border-danger @enderror"
                                                type="text"
                                                placeholder="Business director last name">
                                            <small class="text-danger error-lablel" >
                                                @error('director_last_name') {{$message}} @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="director_email"
                                    class="form-control @error('director_email') border-danger @enderror"
                                    type="text"
                                    placeholder="Business director email address">
                                <small class="text-danger error-lablel" >
                                    @error('director_email') {{$message}} @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input
                                    wire:model="director_details"
                                    class="form-control @error('director_details') border-danger @enderror"
                                    type="text"
                                    placeholder="Business director details">
                                <small class="text-danger error-lablel" >
                                    @error('director_details') {{$message}} @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <textarea
                                    wire:model="additional_info"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Additional information about your business">
                                </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="ps-btn text-uppercase " type='submit' wire:click="submit()">Apply to Sell</button>
                    </div>

{{--                </form>--}}


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


@push('scripts')
    <script src="{{ asset('plugins/intl-tel-input-master/build/js/intlTelInput.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Vanilla Javascript
            var input = document.querySelector("#telephone");
        var plg=    window.intlTelInput(input,({
                // options here
                allowDropdown:true,
                autoPlaceholder:"polite",
                formatOnDisplay:true,
                geoIpLookup:null,
                initialCountry:"za",
                separateDialCode:true,
                autoHideDialCode:false,
            }));
            $(".iti--allow-dropdown").css("width", "100%");
        })

    </script>
@endpush
