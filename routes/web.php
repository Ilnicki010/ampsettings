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
Route::post('/rating',[
    'uses'=>'PostController@postRate',
    'as'=>'rating.post',
    'middleware'=>'auth'
]);
Route::get('/rating/{post_id}', [
    'uses'=>'PostController@getRate',
    'as'=>'rating.get',
]);
Route::get('/user/{user_nick}', [
    'uses'=>'UserController@getUserProfile',
    'as'=>'user'
]);
Route::get('/toprated', [
    'uses'=>'PostController@getTopRated',
    'as'=>'toprated'
]);
Route::get('/latest', [
    'uses'=>'PostController@getLatest',
    'as'=>'latest'
]);
Route::get('/logout', [
    'uses'=>'UserController@getLogout',
    'as' => 'logout'
]);
Route::get('/artist/find',[
    'uses'=>'SearchController@searchArtists',
    'as'=>'artistfind']);