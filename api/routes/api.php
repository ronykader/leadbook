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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'auth','namespace'=>'App\Http\Controllers\Auth'], function(){
    Route::post('register', 'RegisterController@store');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LogoutController@logout');
    Route::get('me', 'MeController@dashboard');

    Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');

    // Send reset password mail
    Route::post('reset-password', 'ForgotPasswordController@sendPasswordResetLink');
    // handle reset password form process
    Route::post('reset/password', 'ResetPasswordController@callResetPassword');
});

Route::get('company-list','App\Http\Controllers\CompanyController@companyList');
Route::get('company/search','App\Http\Controllers\CompanyController@searchCompany');
Route::post('favorite/{company}', 'App\Http\Controllers\CompanyController@favoriteCompany');
Route::post('unfavorite/{company}', 'App\Http\Controllers\CompanyController@unFavoriteCompany');
Route::get('my-favorites', 'App\Http\Controllers\Auth\MeController@myFavorites');
