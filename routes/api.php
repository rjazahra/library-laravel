<?php

use Illuminate\Http\Request;
use App\Controllers\Controller;

use App\Verification;

use App\User;


use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();

//});
//Route::apiResource('category', 'CategoryController')->middleware('cors');
//Route::apiResource('product', 'ProductController')->middleware('cors');

// Route::get('/sms', 'SmsController@index')->middleware('cors');
// Route::post('/sms', 'SmsController@post')->middleware('cors');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('/twitts/all', 'TwitterController@index')->middleware('cors');
Route::post('/twitts', 'TwitterController@post')->middleware('cors');
//-------------------------------------------------------------------------------------//
Route::post('/book', 'BookController@index')->middleware('cors');
Route::post('/bookall', 'BookController@getfunc')->middleware('cors');
Route::post('/register', 'Auth\AuthController@register')->middleware('cors');
Route::post('/login', 'Auth\AuthController@login')->middleware('cors');