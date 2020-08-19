<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json([
                'errors' => $validator->errors(),
                'message' => $validator->errors()->first(),

            ], 401);
        }
        $user = User::create([
            'type' => $request->type,
            'gender' => $request->gender,
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);

        $token = auth()->login($user);

        return response()->json([
            'token' => $token,
            'id' => auth()->user()->id,
            'type' => auth()->user()->type,
            'gender' => auth()->user()->gender,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email
        ], 201, [], JSON_NUMERIC_CHECK);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');;


        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized user'], 401);
        }

        return response()->json([
            'token' => $token,
            'id' => auth()->user()->id,
            // 'type' => auth()->user()->type,
            // 'gender' => auth()->user()->gender,
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
        ], 200, [], JSON_NUMERIC_CHECK);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            //'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
