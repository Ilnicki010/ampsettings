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

Route::get('/', function () {
    return view('home');
});
Route::post('/',[
    'uses'=>'PostController@postSearchPost',
    'as'=>'home',
]);
Route::view('/join', 'join')->name('join');

Route::post('/signup',[
    'uses'=>'UserController@postSignUp',
    'as'=>'signup'
]);
Route::post('/signin',[
    'uses'=>'UserController@postSignIn',
    'as'=>'signin'
]);
Route::get('/create', function () {
    return view('create');
});
Route::post('/create',[
    'uses'=>'PostController@postCratePost',
    'as'=>'create',
]);
Route::get('/user/{user_nick}', [
    'uses'=>'UserController@getUserProfile',
    'as'=>'user'
]);
Route::get('/logout', [
    'uses'=>'UserController@getLogout',
    'as' => 'logout'
]);