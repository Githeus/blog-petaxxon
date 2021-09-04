<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rota para retornar token de autenticação
// Informar email e password
Route::post('login','ApiController@login')->name('api.login');

// ROTAS PROTEGIDAS PELO API_TOKEN
// informar sempre api_token
Route::middleware('auth:api')->group( function(){

    //POSTS
    Route::post('post/store','PostController@store');
    Route::post('post/{post}/update','PostController@update');
    Route::post('post/{post}/delete','PostController@delete');

    //COMENTÁRIOS
    Route::post('comment/store','CommentController@store');

} );
