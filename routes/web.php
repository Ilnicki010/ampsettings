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

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::view('/', 'home')->name('home');
Route::post('/', [
    'uses' => 'PostController@postSearchPost',
    'as' => 'home',
]);
Route::view('/join', 'join')->name('join');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup',
]);
Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin',
]);
Route::view('/create', 'create')->name('create');
Route::post('/create', [
    'uses' => 'PostController@postCratePost',
    'as' => 'create',
]);
Route::post('/rating', [
    'uses' => 'PostController@postRate',
    'as' => 'rating.post',
    'middleware' => 'auth',
]);
Route::get('/rating/{post_id}', [
    'uses' => 'PostController@getRate',
    'as' => 'rating.get',
]);
Route::get('/user/{user_nick}', [
    'uses' => 'UserController@getUserProfile',
    'as' => 'user',
]);
Route::get('/artist/list', [
    'uses' => 'ArtistController@getAristList',
    'as' => 'artist.list',
]);
Route::get('/artist/{artist_name}', [
    'uses' => 'ArtistController@getAristSite',
    'as' => 'artist',
]);
Route::get('/toprated', [
    'uses' => 'PostController@getTopRated',
    'as' => 'toprated',
]);
Route::get('/latest', [
    'uses' => 'PostController@getLatest',
    'as' => 'latest',
]);
Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout',
]);
Route::get('/find/artist', [
    'uses' => 'SearchController@searchArtists',
    'as' => 'artistfind']);
Route::get('/find/song', [
    'uses' => 'SearchController@searchSong',
    'as' => 'songfind']);
Route::view('/privacy', 'static-pages.privacy')->name('privacy');
