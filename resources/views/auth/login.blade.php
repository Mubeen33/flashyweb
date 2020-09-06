@extends('layouts.master')

@section('content')


<div class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.rootPage') }}">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </div>
        <div class="ps-my-account-2">
            <div class="container">
                <div class="ps-section__wrapper">
                    <div class="ps-section__left">
                        <div class="ps-form--account ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#sign-in">Login</a></li>
                                <li><a href="#register">Register</a></li>
                            </ul>

                            <div class="p-3">
                                @include('msg.msg')
                            </div>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="sign-in">
                                    <div class="ps-form__content">
                                        <h5>Log In Your Account</h5>
                                        <form id="login--form" action="{{ route('customer.login.Post') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="email" name="email" placeholder="Email address">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group form-forgot">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="password" name="password" placeholder="Password" ><a href="{{ route('customer.resetPassForm.get') }}">Forgot?</a>
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group">
                                                <div class="ps-checkbox">
                                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                                                    <label for="remember-me">Rememeber me</label>
                                                </div>
                                            </div>
                                            <div class="form-group submtit">
                                                <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>

                                <div class="ps-tab" id="register">
                                    <div class="ps-form__content">
                                        <h5>Register An Account</h5>
                                        <form id="register--form" action="{{ route('customer.registration.post') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" name="first_name" type="text" placeholder="First Name">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="text" name="last_name" placeholder="Last Name">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="email" name="email" placeholder="Email">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="password" name="password" placeholder="Password">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group">
                                                <input onclick="removeErrorLevels($(this), 'input')" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                                <small class="place-error--msg"></small>
                                            </div>
                                            <div class="form-group submtit">
                                                <button type="submit" class="ps-btn ps-btn--fullwidth">Register</button>
                                            </div>
                                            <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our<a href="#">privacy policy.</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__right">
                        @if($signupContent)
                        <figure class="ps-section__desc">
                            @if($signupContent->heading != NULL)
                                <figcaption>{{$signupContent->heading}}</figcaption>
                            @endif

                            @if($signupContent->description != NULL)
                                <p>{{$signupContent->description}}</p>
                            @endif

                            <ul class="ps-list">
                                @if($signupContent->text_line_one != NULL && $signupContent->text_line_one_icon)
                                <li><img src="{{$signupContent->text_line_one_icon}}" width="40px" height="40px"><span>{{ $signupContent->text_line_one }}</span></li>
                                @endif
                                @if($signupContent->text_line_two != NULL && $signupContent->text_line_two_icon)
                                <li><img src="{{$signupContent->text_line_two_icon}}" width="40px" height="40px"><span>{{ $signupContent->text_line_two }}</span></li>
                                @endif
                                @if($signupContent->text_line_three != NULL && $signupContent->text_line_three_icon)
                                <li><img src="{{$signupContent->text_line_three_icon}}" width="40px" height="40px"><span>{{ $signupContent->text_line_three }}</span></li>
                                @endif
                            </ul>
                        </figure>
                        @endif

                        <div>
                            <aside>
                                <img src="{{ $coupon->image }}" class="img-fluid">
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#login--form").on('submit', function(e){
            e.preventDefault()
            let formID = "login--form";
            let form = $(this);
            let url = form.attr('action');
            let type = form.attr('method');
            let form_data = form.serialize();
            formSubmitWithoutFile(formID, url, type, form_data);
        })


        $("#register--form").on('submit', function(e){
            e.preventDefault()
            let formID = "register--form";
            let form = $(this);
            let url = form.attr('action');
            let type = form.attr('method');
            let form_data = form.serialize();
            formSubmitWithoutFile(formID, url, type, form_data);
        })
    })
</script>
<script type="text/javascript" src="{{ asset('js/general-form-submit.js') }}"></script>
@endpush