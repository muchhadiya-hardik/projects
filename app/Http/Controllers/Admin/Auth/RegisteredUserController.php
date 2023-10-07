<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        // $this->stripe = new \Stripe\StripeClient(
        //     'sk_test_51M1kyRSCWHgOAQxvgNYBCBrwrGJQYOCcjuw8z7Ouf0eVIoKStl8VRDf3Ep5OSPE1gAsxsOHScc0Q4QAIvM4xnVOe00nIXEuoNp'
        // );
    }

    public function create() {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $id = $this->stripe->customers->create([
        //     'email'       => $request->email,
        //     'description' => 'My First Test Customer',
        // ]);
        $user = Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'stripe_id'=> 'test',
            // 'stripe_id'=> $id['id'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ADMIN);
    }
}
