@extends('layouts.master')

@section('content')

<div class="ps-page--404">
    <div class="container">
        <div class="ps-section__content"><img src="img/404.jpg" alt="">



            <form class="ps-form--post-comment" action="{{route('frontend.rootPage')}}" method="get">
                <h3 class="text-success">Successfully verified</h3>
                <p>Your email has been verified successfully</p>
                <div class="form-group submit">
                    <button class="ps-btn">Go To Home</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
