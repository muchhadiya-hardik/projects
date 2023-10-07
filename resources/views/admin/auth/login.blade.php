@extends('admin.layouts.guestAdmin')
@section('logo')
    @include('front.components.application-logo')
@endsection
@section('content')
    <div class="container eg-admin">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <h1 class="logo-name">LS</h1>
            <h3>Welcome to the {{ config('app.name') }}</h3>
            <p>Login in. To see it in action.</p>
            <form class="m-t" id="admin-login" role="form" method="POST" action="{{ route('admin::login.save') }}">
                @csrf
                <div class="form-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" data-validation="required email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3 ">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" data-validation="required" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3 ">
                    <input type='checkbox' id="remember_me" name="remember" class="form-check-input" />

                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Login') }}</button>
                <a href="{{ route('admin::password.request') }}"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('admin::register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>{{ config('app.name') }} &copy; {{ date('Y') }}</small> </p>
        </div>
    </div>


    {{-- <div class="card-body">
            <!-- Session Status -->

 @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

            @include('admin.components.auth-validation-errors')

            @if (\Session::has('error'))
            <div class = 'alert alert-danger' role="alert">
                <div class="text-danger">{!! \Session::get('error') !!}</div>
            </div>
            @endif
            <form method="POST" action="{{ route('admin::login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email">Email</label>

                    <input type="email" class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>

                    <input type="password" class="form-control" id="password" type="password"
                             name="password"
                             required autocomplete="current-password" required />
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <div class="form-check">
                        <input type='checkbox' id="remember_me" name="remember"  class="form-check-input"/>

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
                        @if (Route::has('admin::register'))
                            <a href="{{ route('admin::register') }}" class="ms-5 text-muted mx-3">Register</a>
                        @endif
                            @if (Route::has('admin::password.request'))
                            <a class="text-muted me-3" href="{{ route('admin::password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="d-grid gap-2 my-4">
                <a class="btn btn-outline-dark w-100" href="{{ route('auth.google') }}">
                    <img class="socialicon" src="{{ asset('assets/front/images/google.svg') }}" alt="Google Logo">
                    Continue with Google
                </a>
                <a class="btn btn-outline-secondary w-100" href="{{ route('auth.twitter') }}">
                    <img class="socialicon" src="assets{{"/images/twitter.svg"}}" alt="Twitter Logo">
                    Continue with Twitter
                </a>
                <a class="btn btn-outline-secondary bg-primary text-light w-100" href="{{ route('auth.facebook') }}">
                    <img class="socialicon " src="{{asset('assets/front/images/facebook.svg')}}" alt="facebook Logo">
                    Continue with facebook
                </a>
                </div>
            </form>
        </div> --}}
@endsection
@push('scripts')
    <script type="module">
        $("#admin-login").validate()
    </script>
@endpush
