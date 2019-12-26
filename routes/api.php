<?php

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout')->middleware('jwt.verified');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me')->middleware('jwt.verified');
});


Route::resource('categories', 'Api\CategoryController')->middleware(['api', 'jwt.verified']);
Route::resource('authors', 'Api\AuthorController')->middleware(['api', 'jwt.verified']);
