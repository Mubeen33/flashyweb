@extends('layouts.master')

@section('content')

<div class="ps-page--404">
    <div class="container">
        <div class="ps-section__content"><img src="img/404.jpg" alt="">



            <form class="ps-form--post-comment" action="{{route('verification.send')}}" method="post">
                @csrf
                <h3 class="text-danger">Not verified </h3>
                <p>Sorry Your Email Address is not verified yet verify it first</p>
                <div class="form-group submit">
                    <button class="ps-btn">Resend Verification Link</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
