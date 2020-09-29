<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

     /**
     * Create a new LoginController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


     /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if( !$token = auth()->attempt($request->only('username','password'))) {
            return $this->unauthenticatedErrorResponse();
        }

        if(! auth()->user()->hasVerifiedEmail() ){
            return $this->unauthenticatedErrorResponse('Account is not verified');
        }

        return response()->json(compact('token'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    private function unauthenticatedErrorResponse($message = null)
    {
        return response()->json([
            'message' => 'Unauthenticated.',
            'errors' => [
                'root' => [$message ?? "Invalid login credentials."]
            ]
        ], 401);
    }
}
