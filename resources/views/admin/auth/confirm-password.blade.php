@extends('admin.layouts.guestAdmin')
@section('logo')
    @include('admin.components.application-logo')
@endsection
    @section('content')
        <div class="card-body">
            <div class="mb-4 text-sm text-muted">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <!-- Validation Errors -->
            @include('admin.components.auth-validation-errors')

            <form method="POST" action="{{ route('admin::password.confirm.save') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <label for="password" >Password</label>

                <input class="form-control" id="password" type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button class="ms-4 btn btn-dark">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
        </div>
    @endsection
