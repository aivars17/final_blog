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



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', 'PostsController@index')->name('post.all');
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post', 'PostsController@store')->name('post.store');
    Route::delete('/post/{id}/delete', 'PostsController@destroy')->name('post.destroy');
    Route::get('/post/{id}/edit', 'PostsController@edit')->name('post.edit');
    Route::patch('/post/{id}/update', 'PostsController@update')->name('post.update');
    Route::get('/post/{id}', 'PostsController@show')->name('post.show');
    Route::get('/posts/{id}/author/', 'PostsController@postsAuthor')->name('posts.author');
    Route::get('/register', 'UserController@register')->name('user.register');
    Route::post('/register', 'UserController@store')->name('user.store');
    Route::get('/user', 'UserController@edit')->name('user.edit');
    Route::patch('/user/{user}', 'UserController@update')->name('user.update');
    Route::get('/users', 'UserController@show')->name('user.show');
    Route::delete('/user', 'UserController@destroy')->name('user.destroy');

});
Route::get('/', 'HomeController@index')->name('home');

