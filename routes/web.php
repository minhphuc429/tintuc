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

Route::get('/', 'HomeController@index');

Route::prefix('dashboard')->group(function () {
    Route::middleware('role:administrator')->group(function () {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController')->except([
            'show'
        ]);
//
//        Route::resource('users', 'UserController')->except([
//            'show'
//        ]);
//        Route::resource('roles', 'RoleController')->except([
//            'show'
//        ]);
    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
