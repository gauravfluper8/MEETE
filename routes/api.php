<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::match(['post'],'sign_up','CommonController@sign_up');
Route::post('login','CommonController@login');
Route::match(['post'],'social_sign_up_and_login','CommonController@social_sign_up_and_login');
Route::post('resendOtp','CommonController@resendOtp');
Route::post('otpVerify','CommonController@otpVerify');
Route::post('forgetPassword','CommonController@forgetPassword');

Route::group(['middleware'=>['ApiAuthentication']],function(){
	Route::post('logout','CommonController@logout');
	Route::post('complete_profile','CommonController@complete_profile');

});
