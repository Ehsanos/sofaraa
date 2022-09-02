<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'stats' => true,
            'message' => 'Successfully logged out',

        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50',
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {

            return response()->json(['stats' => false, 'errors' => $validator->messages()], 200);
        }
        $token = $this->guard()->attempt($credentials);
        $user =  User::where('email', $request->get('email'))-> with('role')->first();
        if ($user) {
            if ($user->role_id == 4) {
                return response()->json(['stats' => false, 'error' => ' Error 403 Forbidden ']);
            }
            if ($token) {
                return  response()->json([
                    'stats' => true,
                    'token' => $token,
                    'user' => $user
                ]);
            }
        } else {
            return  response()->json([
                'stats' => false,
                'error' => 'user not found '
            ]);
        }

        return response()->json([
            'stats' => false,
            'error' => 'Unauthorized'
        ], 401);
    }

    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password', 'role_id');
        // create validation
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50',
            "role_id" => "required"
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['stats' => false, 'errors' => $validator->messages()], 200);

            /*
            return this syntax
            {
                'stats'=>false,
                  "errors": {
                    "email": [
                        "The email has already been taken."
                    ],
                    "password": [
                        "The password must be at least 6 characters."
                    ]
    }
            }

            */
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'stats' => true,
            'token' =>  $token,
            'user' => $user,
        ]);
    }



    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }


    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

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
        ]);
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
}
