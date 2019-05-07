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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes(['register' => false]);
Route::resource('posts', 'PostController');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoryController');

    Route::resource('tags', 'TagController');

    Route::put('restore-posts/{post}', 'PostController@restore')->name('posts.restore');
    Route::get('trashed-posts', 'PostController@trashed')->name('posts.trash');
    Route::delete('trashed-posts/{post}', 'PostController@destroyTrash')->name('posts.destroy-trash');
});

Route::middleware(['auth', 'admin'])->group(function () {

    //define these routes before your call to Route::resource ; otherwise, the routes defined by the resource method may unintentionally take precedence over the supplemental routes
    Route::get('users/profile', 'UserController@profile')->name('users.profile');
    Route::put('users/profile', 'UserController@updateProfile')->name('users.update-profile');

    Route::resource('users', 'UserController');
});

