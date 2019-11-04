<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/sessions', function(Request $request) {
   $request->session()->all();
});

Route::get('/sessions/store', function(Request $request) {
   $request->session()->put('test', 'a');
});


Route::get('/posts/store', 'PostController@store');

Route::get('/posts/update', 'PostController@update');

Route::get('/posts', 'PostController@index');


Route::get('/cache-clear', function() {
   return Cache::flush();
   // return Cache::put('user_array', Post::all(), 3);
});


Route::get('/convert', 'ConverterController@index');

Route::post('/convert', 'ConverterController@store');

Route::get('/test', 'ConverterController@test');


//
Route::get('/posts', 'PostController@index');

Route::get('/posts/{id}', 'PostController@view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
