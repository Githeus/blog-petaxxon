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

Route::get('/','HomeController@index');
Route::get('/post/{post}','PostController@show')->name('post.show');
Route::get('/post/{post}/comments','PostController@comments')->name('post.comments');

Auth::routes(['login'=>false]);
