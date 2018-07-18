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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'MonosController@index');


Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');




Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show' , 'overview']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        
        Route::get('overview', 'UsersController@overview')->name('users.timeline');
        Route::get('seedetails', 'UsersController@seedetails')->name('monos.monopage');
        Route::get('chat', 'UsersController@chat')->name('users.chat');
        
        
        
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        
        Route::post('favorite', 'MonoFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'MonoFavoriteController@destroy')->name('user.unfavorite');
        Route::get('favoritings', 'UsersController@favoritings')->name('users.favoritings');
        
        Route::post('want', 'MonoWantController@store')->name('mono.want');
        Route::delete('unwant', 'MonoWantController@destroy')->name('mono.unwant');
        Route::get('wantings', 'UsersController@wantings')->name('users.wantings');
        Route::get('wanters', 'UsersController@wanters')->name('users.wanters');
    });

    Route::resource('monos', 'MonosController', ['only' => ['index', 'store', 'destroy']]);
    
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'chat']]);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);
});



