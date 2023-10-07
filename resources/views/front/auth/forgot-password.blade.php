@extends('front.layouts.guest')
{{-- @section('header')
    <div class="orb-heading-block">
        <div class="container content-wrapper header">
            <div class="orb-page-heading">
                <h2>Forgot-Password</h2>
                <p class="orb-breadcrumbs">
                    <span class="breadcrumb-text">Outreachbird</span>
                    - Forgot-Password
                </p>
            </div>
        </div>
    </div>
@endsection --}}
@section('main-content')
    <div class="d-flex justify-content-center">
        <div class="orb-profile-block">
            <div class="orb-profile-content-wrapper">
                <div class="row">
                    <div class="col-lg-9 ">
                        <div class="card orb-cmn-profile-box">
                            <h4 class="cmn-card-title text-dark mb-4">Password Reset</h4>
                            <h5 class="cmn-card-title text-dark mb-4">Forgot your password? Enter your e-mail address below,
                                and
                                we'll send you an e-mail allowing you to reset it.</h5>

                            <div class="card-body">
                                <!-- Session Status -->
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <!-- Validation Errors -->
                                @include('front.components.auth-validation-errors')

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email">Email</label>

                                        <input id="email" type="email" name="email" :value="old('email')" required
                                            autofocus class="form-control" />
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Email Password Reset Link') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endsection
