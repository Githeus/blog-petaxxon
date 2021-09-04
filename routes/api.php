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

Route::middleware('auth:api')->group( function(){
    Route::get('teste', function(){ return "funciona "; }  );
    
    //POSTS
    Route::post('post/store','PostController@store');
} );
