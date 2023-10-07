@extends('front.layouts.guest')
@section('logo')
    @include('front.components.application-logo')
@endsection
@section('content')
    <div class="card-body">
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-3" :errors="$errors" /> --}}
        @include('front.components.auth-validation-errors')

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email</label>

                <input type="email" class="form-control" id="email" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Password</label>

                <input type="password" class="form-control" id="password" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
                <div class="form-check">
                    <input type='checkbox' id="remember_me" name="remember" class="form-check-input" />

                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <button class="btn btn-dark w-100" type="submit">
                {{ __('Log in') }}
            </button>
            <div class="mb-0 mt-3">
                <div class="d-flex justify-content-sm-center align-items-baseline">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ms-5 text-muted mx-3">Register</a>
                    @endif
                    @if (Route::has('password.request'))
                        <a class="text-muted me-3" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="d-grid gap-2 my-4">
                <a class="btn btn-outline-secondary w-100" href="{{ route('auth.google') }}">
                    <img class="socialicon" src="assets{{ '/images/google.svg' }}" alt="Google Logo">
                    Continue with Google
                </a>
                <a class="btn btn-outline-secondary w-100" href="{{ route('auth.twitter') }}">
                    <img class="socialicon" src="assets{{ '/images/twitter.svg' }}" alt="Twitter Logo">
                    Continue with Twitter
                </a>
                <a class="btn btn-outline-secondary bg-primary text-light w-100" href="{{ route('auth.facebook') }}">
                    <img class="socialicon " src="assets{{ '/images/facebook.svg' }}" alt="facebook Logo">
                    Continue with facebook
                </a>
            </div>
        </form>
    </div>
@endsection
