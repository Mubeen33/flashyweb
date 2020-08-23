@extends('layouts.master')

@section('content')

<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.rootPage') }}">Home</a></li>
                <li>Recovery Password</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <div class="ps-form--account ps-tab-root">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Password Recovery</a></li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Reset Password</h5>
                            @include('msg.msg')

                            @if($token !== NULL && $email !== NULL)
                            <form action="{{ route('customer.passwordReset.post') }}" method="POST">
                            	@csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">
                            	<div class="form-group">
                                	<input class="form-control" type="password" name="password" placeholder="New Password">
	                            </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                                </div>

	                            <div class="form-group submtit">
	                                <button type="submit" class="ps-btn ps-btn--fullwidth">RESET</button>
	                            </div>
                            </form>
                            @else
                            <form action="{{ route('customer.sendPassResetLink.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email address" value="{{ old('email') }}">
                                </div>
                                <div class="form-group submtit">
                                    <button type="submit" class="ps-btn ps-btn--fullwidth">Reset Now</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection