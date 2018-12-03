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

Route::get('my_api','HomeController@my_api');

Route::post('login', 'AuthController@login');
Route::post('register','AuthController@register');

//novel
Route::post('addNovel','NovelController@addNovel');
Route::post('deleteNovel/{id}', 'NovelController@deleteNovel');
Route::post('selectNovel','NovelController@selectNovel');
Route::get('selectById/{id}','NovelController@selectById');



// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('details', 'API\UserController@details');
//     });

