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
    <div class="ps-my-account">
        <div class="container">
            <div class="ps-form--account ps-tab-root">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Login</a></li>
                    <li><a href="#register">Register</a></li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Log In Your Account</h5>
                            @include('msg.msg')
                            <form action="{{ route('customer.login.Post') }}" method="POST">
                            	@csrf
                            	<div class="form-group">
                                	<input class="form-control" type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required="1">
	                            </div>
	                            <div class="form-group form-forgot">
	                                <input class="form-control" type="password" name="password" placeholder="Password" required="1"><a href="">Forgot?</a>
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
                        <div class="ps-form__footer">
                            <p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ps-tab" id="register">
                        <div class="ps-form__content">
                            <h5>Register An Account</h5>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username or email address">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Login</button>
                            </div>
                        </div>
                        <div class="ps-form__footer">
                            <p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection