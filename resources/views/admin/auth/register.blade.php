@extends('admin.layouts.guestAdmin')

@push('style')
<style>

.my-error-class {
    color:#FF0000;  /* red */
}
</style>
@endpush
@section('logo')
    {{-- @include('front.components.application-logo') --}}
    {{-- <img src="{{asset('assets/front/images/Outreachbird.png')}}"  style="height:40px;"  alt="registration logo"> --}}
@endsection
@section('content')
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <h2 class="font-bold">Register to the {{config('app.name')}}</h2>
            <p>Create account to see it in action.</p>
            <form class="m-t" id="register-form" role="form" method="POST" action="{{ route('admin::register.save') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" data-validation="required" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" data-validation="required email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                data-validation="required" value="{{ old('password') }}" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Confirm password</label>
                            <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" data-validation="required"
                                value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('admin::login') }}">Login</a>
            </form>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            Copyright {{config('app.name')}}
        </div>
        <div class="col-md-6 text-end">
            <small>&copy; {{date('Y')}}</small>
        </div>
    </div>
</div>
    {{-- <div class="card-body">
        <!-- Validation Errors -->
        @include('admin.components.auth-validation-errors')
        <div id="div"></div>
        <h2 class="text-center fw-bold">Registration</h2>
        <form method="POST" action="" id="form">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name">Name</label>

                <input id="name" class="form-control" type="text" name="name" :value="old('name')"
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email</label>

                <input id="email" class="form-control" type="email" name="email" :value="old('email')"  />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Passowrd</label>

                <input id="password" type="password" class="form-control" name="password"
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>

                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                     />
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3 text-decoration-none" href="{{ route('admin::login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="btn btn-dark">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div> --}}
@endsection
@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#register-form').validate({
            errorClass: "my-error-class",
            rules:{
                name:"required",
                email:{
                    required:true,
                    email:true
                },
                password:{
                    required:true,
                    minlength:8
                },
                password_confirmation:{
                    required:true,
                    minlength:8,
                    equalTo: "#password"
                },
            },messages:{
                name:"Please enter your name",
                email:{
                    required:"Please enter email",
                    email:"Please enter valid email",
                },
                password:{
                    required:"Please enter your password",
                    minlength:"Password must be 8 character long"
                },
                password_confirmation:{
                    required:"Please enter your conform password",
                    minlength:"Conform Password must be 8 character long"
                }
            },

            submitHandler:function(form){
                form.submit();
            }
        });
    })
</script>
@endpush
