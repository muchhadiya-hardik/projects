@extends('front.layouts.guest')


@section('logo')
    @include('front.components.application-logo')
@endsection
@section('content')
    <div class="card-body">
        <!-- Validation Errors -->
        @include('front.components.auth-validation-errors')

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name">Name</label>

                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email</label>

                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Passowrd</label>

                <input id="password" type="password" class="form-control" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>

                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                    required />
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="btn btn-dark">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
