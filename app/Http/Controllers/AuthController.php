<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'string|required',
            'email'=>'email|required',
            'password'=>'string|required|min:6',
            'firstname'=>'string|required',
            'lastname'=>'string|required',
            'gender'=>'string|required',
            'phone_number'=>'string|required',
            'active'=>'string|required'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'message'=>'Registration Failed',
                'a'=>$validator->errors()->toJson()
            ]);

        }
        $user = User::create(['username'=>$request->get('username'),
                            'email' =>$request->get('email'),
                            'password'=>bcrypt($request->password),
                            'firstname'=>$request->get('firstname'),
                            'lastname'=>$request->get('lastname'),
                            'gender'=>$request->get('gender'),
                            'phone_number'=>$request->get('phone_number'),
                            'active'=>$request->get('active')

                        ]);
        return response() -> json([
            'message' => 'User created',
            'user' => $user
        ]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl')
        ]);
    }
}