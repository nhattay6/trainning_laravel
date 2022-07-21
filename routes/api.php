<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::resource(;)
// Route::group(['middleware' => 'guest:api'], function () {
//     Route::post('login', [LoginController::class, 'login']);

//     Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
//     Route::post('email/resend', [VerificationController::class, 'resend']);

//     Route::post('oauth/{driver}', [OAuthController::class, 'redirect']);
//     Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');
// });

Route::post('login', [LoginController::class, 'login']);
Route::post('oauth/{driver}', [OAuthController::class, 'handleRedirect']);
Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');