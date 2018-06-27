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

Route::get('/', 'WelcomeController@index');

//user registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController', ['only' => ['create', 'show']]);
    Route::post('want', 'BookUserController@want')->name('book_user.want');
    Route::delete('want', 'BookUserController@dont_want')->name('book_user.dont_want');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

Route::group(['middleware' => ['auth']], function () {    
    Route::post('read', 'BookUserController@read')->name('book_user.read');
    Route::delete('read', 'BookUserController@dont_read')->name('book_user.dont_read');
});

// Ranking want
Route::get('ranking/want', 'RankingController@want')->name('ranking.want');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('items', 'BooksController', ['only' => ['create', 'show']]);
    Route::post('want', 'BookUserController@want')->name('book_user.want');
    Route::delete('want', 'BookUserController@dont_want')->name('book_user.dont_want');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

// Ranking read
Route::get('ranking/read', 'RankingController@read')->name('ranking.read');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController', ['only' => ['create', 'show']]);
    Route::post('read', 'BookUserController@read')->name('book_user.read');
    Route::delete('read', 'BookUserController@dont_read')->name('book_user.dont_read');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});

//Review
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::resource('reviews', 'ReviewsController', ['only' => ['create', 'store', 'destroy']]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
});