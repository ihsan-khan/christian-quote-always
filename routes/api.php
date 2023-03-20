<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('register-by-google', [AuthController::class, 'registerWithSocial']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('reset-password-request', [AuthController::class,'resetPasswordRequest']);
    Route::post('check-password-code', [AuthController::class,'checkPasswordCode']);
    Route::post('reset-password', [AuthController::class,'resetPassword']);

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('profile', [AuthController::class,'profile']);
        Route::get('resend-code', [AuthController::class,'resendCode']);
        Route::post('check-verification-code', [AuthController::class,'checkVerficationCode']);
    });
});

Route::post('quote/store',[QuoteController::class, 'store']);
Route::post('/upload-quote',[QuoteController::class, 'store']);