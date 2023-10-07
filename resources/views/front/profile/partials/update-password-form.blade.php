@vite(['resources/sass/app.scss','resources/js/app.js'])
<section class="mx-2 my-3">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="current_password" class="col-sm-1 col-form-label" >Current Passowrd</label>
            <div class="col-sm-10">
                <input id="current_password" name="current_password" type="password" class="form-control w-25" autocomplete="current-password" />
            </div>
            {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" /> --}}
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-1 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input id="password" name="password" type="password" class="form-control w-25" autocomplete="new-password" />
            </div>
            {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-1 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control w-25" autocomplete="new-password" />
            </div>
            {{-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 mx-5 my-3 bg-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Save') }}</button>
            @if (\Route::current()->uri == 'change-password')
                <a href="{{route('dashboard')}}" class="text-decoration-none inline-flex items-center px-4 py-2 mx-5 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Back') }}</a>
            @endif
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="alert alert-success"
                >{{ session('status') }}</p>
            @endif
        </div>
    </form>
    @php
    if(empty($errors->updatePassword))
    {
        $rr=json_decode($errors->updatePassword);
        foreach ($rr as $d)
        {
        echo '<p class="alert alert-danger">'.$d[0].'</p>';
        }
    }
    @endphp
</section>
