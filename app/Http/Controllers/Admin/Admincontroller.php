<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
// use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
class Admincontroller extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $admin = Admin::where('email', $request->email)->first();
    if (! $admin || ! Hash::check($request->password, $admin->password)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    $token = JWTAuth::fromUser($admin);
    $admin->access_token = $token;
    $admin->save();
    return response()->json([
        'access_token' => $this->createNewToken($token),
        'token_type' => 'Bearer',

    ]);
}

public function logout() {
    auth()->logout();
    return response()->json(['message' => 'Admin successfully signed out']);
}



public function userProfile() {
    return response()->json(auth()->user());
}

protected function createNewToken($token){
    return response()->json([
        'access_token' => $token,
        'admin' => auth()->user()
    ]);
}


public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:tourists',
        'password' => 'required|string|min:6',
        'SSN' => 'required|string',
        'phone' => 'required|string',
        'gender' => 'required|string',
        'Role'=>'required |string',

    ]);
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }

    $admin =Admin::create([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'SSN' => $request->get('SSN'),
        'phone' => $request->get('phone'),
        'gender' => $request->get('gender'),
        'email' => $request->get('email'),
        'Role' => $request->get('Role'),
        'password' => Hash::make($request->get('password')),
    ]);

    $token = JWTAuth::fromUser($admin);
    $admin->access_token = $token;
    $admin->save();

    return response()->json([
        'admin' => $admin,
        'token' => $token,
    ], 201);
}
}
