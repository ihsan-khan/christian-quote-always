<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'terms_conditions' => 'required|boolean|accepted'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $random = rand(111111,999999);
        $user->password_code = $random;

        if ($user->save()) {
                return response()->json([
                    'message' => 'Account Created, We have sent a verification code to you',
                    'status_code' => 201
                ], 201);
            // $userData = array(
            //     'email' => $user->email,
            //     'full_name' => $user->name,
            //     'random' => $random
            // );

            // Mail::send('emails.verify_email_request', $userData, function($message) use ($userData){
            //     $message->from('no-reply@christianquotealways.com');
            //     $message->to($userData['email']);
            //     $message->subject('Email Verification (CQ)');
            // });

            // if (Mail::failures()) {
            //     $user->delete();
            //     return response()->json([
            //         'message' => 'Some error occurred, Please try again',
            //         'status_code' => 500
            //     ], 500);
            // } else {
        //         return response()->json([
        //             'message' => 'Account Created, We have sent a verification code to you',
        //             'status_code' => 201
        //         ], 201);
        //     }
        // } else {
        //     return response()->json([
        //         'message' => 'Some errorr occurred, Please try again',
        //         'status_code' => 500
        //     ], 500);
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid username/password'
            ], 401);
        }

        $user = $request->user();

        $user->tokens()->delete();

        if ($user->role == 'superadmin') {
            $token = $user->createToken('Personal Access Token', ['superadmin']);
        } if ($user->role == 'admin') {
            $token = $user->createToken('Personal Access Token', ['admin']);
        } else {
            $token = $user->createToken('Personal Access Token', ['user']);
        }

        return response()->json([
            'user' => $user,
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'role' => $token->accessToken->abilities
        ], 200);
    }
}
