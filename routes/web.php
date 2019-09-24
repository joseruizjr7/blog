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
    return redirect('/home');
    //return view('welcome');
});

// Shows other users profile
Route::get('user/{id}', 'ShowProfile')->name('user.show');

// Authenticated user profile routes
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

// Posts routes
Route::resource('/posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
