<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * incoming registration request.
     *
     * @param Request $request
     * @return void
     */
    protected function store(Request $request)
    {
        $request->validate( [
            'username' => ['required', 'string', 'min:6', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'max:255'],
            'address' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();

        // Send Email to this user to verify email address.
        event(new Registered($user));

        return response()->json(['message' => 'Account Created. Please verify your email.'],200);
    }
}
