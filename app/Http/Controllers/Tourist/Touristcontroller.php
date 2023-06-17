<?php

namespace App\Http\Controllers\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Tourist;
use Illuminate\Support\Facades\Log;
// use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class Touristcontroller extends Controller
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

    $tourist = Tourist::where('email', $request->email)->first();
    if (! $tourist || ! Hash::check($request->password, $tourist->password)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    $token = JWTAuth::fromUser($tourist);
    $tourist->access_token = $token;
    $tourist->save();
    return response()->json([
        'access_token' => $this->createNewToken($token),
        'token_type' => 'Bearer',

    ]);
}

public function logout() {
    auth()->logout();
    return response()->json(['message' => 'User successfully signed out']);
}



public function userProfile() {
    return response()->json(auth()->user());
}

protected function createNewToken($token){
    return response()->json([
        'access_token' => $token,
        'user' => auth()->user()
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
    ]);

    if ($validator->fails()) {
        $errors = new \stdClass();
        foreach ($validator->errors()->toArray() as $field => $error) {
            $errors->$field = $error[0];
        }
        return response()->json(['errors' => $errors], 400);
    }
    $tourist =Tourist::create([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'SSN' => $request->get('SSN'),
        'phone' => $request->get('phone'),
        'gender' => $request->get('gender'),
        'email' => $request->get('email'),
        'password' => Hash::make($request->get('password')),
    ]);

    $token = JWTAuth::fromUser($tourist);
    $tourist->access_token = $token;
    $tourist->save();

    return response()->json([
        'tourist' => $tourist,
        'token' => $token,
    ], 201);
}
}




















// public function register(Request $request){
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'password' => 'required|string|min:6',
//         'SSN' => 'required|string',
//         'phone' => 'required|string',
//         'gender' => 'required|string',

//     ]);

//     $tourist = Tourist::create([
//         'first_name' => $request->first_name,
//         'last_name' => $request->last_name,
//         'email' => $request->email,
//         'SSN' => $request->SSN,
//         'phone' => $request->phone,
//         'gender' => $request->gender,
//         'password' => Hash::make($request->password),
//     ]);

//     $token = Auth::login($tourist);
//     return response()->json([
//         'status' => 'success',
//         'message' => 'Tourist created successfully',
//         'tourist' => $tourist,
//         'authorisation' => [
//             'token' => $token,
//             'type' => 'bearer',
//         ]
//     ]);
// }

// public function logout()
// {
//     Auth::logout();
//     return response()->json([
//         'status' => 'success',
//         'message' => 'Successfully logged out',
//     ]);
// }

// public function me()
// {
//     return response()->json([
//         'status' => 'success',
//         'tourist' => Auth::user(),
//     ]);
// }

// public function refresh()
// {
//     return response()->json([
//         'status' => 'success',
//         'tourist' => Auth::user(),
//         'authorisation' => [
//             'token' => Auth::refresh(),
//             'type' => 'bearer',
//         ]
//     ]);
// }



//     public function __construct()
//     {
//         $this->middleware('auth:api', ['except' => ['login','register']]);
//     }

//     public function login(Request $request)
// {

//     $request->validate([
//         'email' => 'required|string|email',
//         'password' => 'required|string',
//     ]);

//     $credentials = $request->only('email', 'password');
//     $token = Auth::attempt($credentials);

//     if (!$token) {
//         return response()->json([
//             'status' => 'error',
//             'message' => 'Unauthorized',
//         ], 401);
//     }

//     $tourist = Auth::user();
//     return response()->json([
//         'status' => 'success',
//         'tourist' => $tourist,
//         'authorisation' => [
//             'token' => $token,
//             'type' => 'bearer',
//         ],
//     ]);

// }
