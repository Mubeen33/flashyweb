@extends('layouts.master')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Customer / Dashboard</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            @include('Customers.partials.dashboard-left')
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="{{ route('customer.profieUpdate.post') }}" method="POST">
                                @csrf
                                <div class="ps-form__header">
                                    <h3>My Profile</h3>
                                    @include('msg.msg')
                                </div>
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="first_name" placeholder="Please enter your first..." value="{{ Auth::guard('customer')->user()->first_name }}">
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="last_name" placeholder="Please enter your last..." value="{{ Auth::guard('customer')->user()->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" type="tel" name="phone" placeholder="Please enter phone number..." value="{{ Auth::guard('customer')->user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Please enter your email..." value="{{ Auth::guard('customer')->user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input class="form-control" type="date" name="birthday" placeholder="Please enter your birthday..." value="{{ Auth::guard('customer')->user()->birthday }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender">
                                                    @php
                                                        $gender = Auth::guard('customer')->user()->gender;
                                                    @endphp
                                                    <option value="">Select One</option>
                                                    <option value="Male" @if($gender === "Male") selected @endif>Male</option>
                                                    <option value="Female" @if($gender === "Female") selected @endif>Female</option>
                                                    <option value="Other" @if($gender === "Other") selected @endif>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button onclick="return confirm('Are you sure?')" class="ps-btn" type="submit" name="update_profile" value="1">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection