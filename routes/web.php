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

Route::get('/','pagesController@index');

Route::get('/about', 'pagesController@about');

Route::get('/contact', 'pagesController@contact')->name('contactPage');

Route::resource('posts', 'postController');

Route::post('/comments/{slug}', 'CommentsController@store')->name('comments.store');

Auth::routes();

Route::resource('tags', 'TagsController')->only(['show']);

Route::get('/home', 'HomeController@index')->name('home');
