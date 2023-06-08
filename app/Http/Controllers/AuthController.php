<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login (Request $request) {

        try {
           
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);
            if ($validator->fails())
            {
                return response()->error(['errors'=>$validator->errors()->all()], 422);
            }
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('Project Management Challenge')->accessToken;
    
                    $accessToken = $user->createToken('authToken')->accessToken;

                    return response()->success(['user' => $user, 'access_token' => $accessToken]);
                } else {
                    $response = ["message" => "Password mismatch"];
                    return response()->error($response, 404);
                }
            } else {
                $response = ["message" =>'User does not exist'];
                return response()->error($response, 404);
            }

        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }

        
    }

}
