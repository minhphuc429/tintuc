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
        'posts' => 'API\PostController'
    ]);
});

Route::prefix('dashboard')->group(function () {
    Route::get('categories', function () {
        return view('dashboard.categories');
    })->name('dashboard.categories');
});

//Route::get('/', 'API\PostController@index');
//Route::get('/posts', 'API\PostController@index')->name('list_posts');
//Route::group(['prefix' => 'posts'], function () {
//    Route::get('/drafts', 'API\PostController@drafts')
//        ->name('list_drafts')
//        ->middleware('auth');
//    Route::get('/show/{id}', 'API\PostController@show')
//        ->name('show_post');
//    Route::get('/create', 'API\PostController@create')
//        ->name('create_post')
//        ->middleware('can:post.create');
//    Route::post('/create', 'API\PostController@store')
//        ->name('store_post')
//        ->middleware('can:post.create');
//    Route::get('/edit/{post}', 'API\PostController@edit')
//        ->name('edit_post')
//        ->middleware('can:post.update,post');
//    Route::post('/edit/{post}', 'API\PostController@update')
//        ->name('update_post')
//        ->middleware('can:post.update,post');
//    Route::get('/publish/{post}', 'API\PostController@publish')
//        ->name('publish_post')
//        ->middleware('can:post.publish');
//});
