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
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('api')->group(function () {
    Route::apiResources([
        'categories' => 'API\CategoryController',
        'posts', 'API\PostController'
    ]);
});

Route::prefix('dashboard')->group(function () {
    Route::get('categories', function () {
        return view('categories');
    });
});
