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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/doctor','ApiControllers@create');

Route::get('/doctor','ApiControllers@index');

Route::get('/doctor/{id}','ApiControllers@showbyid');

Route::put('/doctorupdate/{id}','ApiControllers@updatebyid');

Route::delete('/doctordelete/{id}','ApiControllers@deletebyid');

Route::post('/products','ProductController@create');

Route::put('/productupdate/{id}','ProductController@update');