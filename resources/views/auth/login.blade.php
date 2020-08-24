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
                                            <input class="form-control" type="password" name="password" placeholder="Password" required="1"><a href="{{ route('customer.resetPassForm.get') }}">Forgot?</a>
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
                                        @include('msg.msg')
                                        <form action="{{ route('customer.registration.post') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input class="form-control" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
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
                            <figcaption>@if($signupContent->heading != NULL){{$signupContent->heading}}@endif</figcaption>
                            <p>@if($signupContent->description != NULL){{$signupContent->description}}@endif</p>
                            
                            @if($signupContent->text_lines != NULL)
                            @php
                                $lines = explode('##', $signupContent->text_lines);
                            @endphp
                            <ul class="ps-list">
                                <li><i class="icon-credit-card"></i><span>{{ $lines[0] }}</span></li>
                                <li><i class="icon-clipboard-check"></i><span>{{ $lines[1] }}</span></li>
                                <li><i class="icon-bag2"></i><span>{{ $lines[0] }}</span></li>
                            </ul>
                            @endif
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