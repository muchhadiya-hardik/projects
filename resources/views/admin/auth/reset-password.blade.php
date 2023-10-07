@extends('admin.layouts.guestAdmin')

@section('logo')
    @include('admin.components.application-logo')
@endsection
@section('content')
    {{-- <div class="card-body">
        <!-- Validation Errors -->
        @include('admin.components.auth-validation-errors')

        <form method="POST" action="{{ route('admin::password.store') }}">
            @csrf
            {{ method_field('PUT') }}

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email</label>

                <input id="email" class="form-control" type="email" name="email"
                    :value="old('email', $request - > email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Password</label>

                <input class="form-control" id="password" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>

                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                    required />
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div> --}}
    <div class="passwordBox animated fadeInDown">

        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Change password</h2>
                    <p>Enter your current password and new password.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            {{-- <form class="m-t" role="form" method="POST"
                                action="{{ route('admin::password.change.update') }}"> --}}
                                <form method="POST" action="{{ route('admin::password.store') }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group mb-3">
                                    <input id="email" class="form-control" type="email" name="email"
                                    :value="old('email', $request->email)" placeholder="{{ __('Email') }}" required autofocus />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class=" form-group mb-3">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="{{ __('Password') }}" required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="{{ __('Confirm Password') }}"  required />
                                </div>
                                <button type="submit"
                                    class="btn btn-primary block full-width m-b">{{ __('Reset Password') }}</button>
                                {{-- <a class="btn btn-success block full-width m-b"
                                    href="{{ url(config('settings.ADMIN_PREFIX')) }}">{{ __('Dashboard') }}</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
