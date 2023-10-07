@extends('front.layouts.guest')

@section('logo')
    @include('front.components.application-logo')
@endsection
    @section('content')
        <div class="card-body">
            <!-- Validation Errors -->
            @include('front.components.auth-validation-errors')

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                {{ method_field('PUT') }}

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email">Email</label>

                    <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password">Password</label>

                    <input class="form-control" id="password" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" >Confirm Password</label>

                    <input class="form-control" id="password_confirmation" type="password"
                                        name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
