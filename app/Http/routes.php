<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('storeuser' ,'Auth\AuthController@handleProviderCallback');
Route::get('google' ,'Auth\AuthController@google');
Route::get('facebook' ,'Auth\AuthController@facebook');
Route::get('github' ,'Auth\AuthController@github');
Route::get('twitter' ,'Auth\AuthController@twitter');





Route::group(['prefix'=> 'api' , 'middleware' => 'auth:api'],function(){
    Route::get('users',function(){
        return App\User::all();
    });
});