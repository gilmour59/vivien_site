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
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

Route::prefix('packages')->group(function () {
    Route::get('/', 'PackageController@index')->name('packages.index');
    Route::get('/{category}', 'PackageController@show')->name('packages.show');
});

Route::get('about', 'WelcomeController@about')->name('about');
Route::get('contact', 'WelcomeController@contact')->name('contact');
Route::post('contact', 'WelcomeController@email')->name('contact.email');

Route::prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    Route::resource('posts', 'PostController', ['except' => ['show']]);
    Route::put('restore-posts/{post}', 'PostController@restore')->name('posts.restore');
    Route::get('trashed-posts', 'PostController@trashed')->name('posts.trash');
    Route::delete('trashed-posts/{post}', 'PostController@destroyTrash')->name('posts.destroy-trash');
    Route::put('posts/{post}/hot', 'PostController@hot')->name('posts.hot');

    Route::resource('categories', 'CategoryController');

    //define these routes before your call to Route::resource ; otherwise, the routes defined by the resource method may unintentionally take precedence over the supplemental routes
    Route::get('users/profile', 'UserController@profile')->name('users.profile');
    Route::put('users/profile', 'UserController@updateProfile')->name('users.update-profile');
    //resource should be called after the supplementary routes of "users"
    Route::resource('admin/users', 'UserController');

    Auth::routes(['register' => false]);
});

