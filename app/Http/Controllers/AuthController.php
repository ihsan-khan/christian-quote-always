<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
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
            $userData = array(
                'email' => $user->email,
                'full_name' => $user->name,
                'random' => $random
            );

            Mail::send('emails.verify_email_request', $userData, function($message) use ($userData){
                $message->from('no-reply@christianquotealways.com');
                $message->to($userData['email']);
                $message->subject('Email Verification (CQ)');
            });

            if (Mail::failures()) {
                $user->delete();
                return response()->json([
                    'message' => 'Some error occurred, Please try again',
                    'status_code' => 500
                ], 500);
            } else {
                return response()->json([
                    'message' => 'Account Created, We have sent a verification code to you',
                    'status_code' => 201
                ], 201);
            }
        } else {
            return response()->json([
                'message' => 'Some errorr occurred, Please try again',
                'status_code' => 500
            ], 500);
        }
    }
}
