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

Route::group(["middleware" => "guest:api"], function () {
    Route::post("/login", "JwtController@login");
});

Route::post('/register', "JwtController@register");


Route::group(["middleware" => "auth:api"], function () {
    Route::get("/me", "JwtController@me");
    Route::post('/fields/create','FieldController@create');
    Route::post('/fields/update','FieldController@update');
    Route::post('/fields/delete','FieldController@delete');
    Route::post('/domains/create','DomainController@create' );
    Route::post('/domains/update','DomainController@update' );
    Route::post('/domains/delete','DomainController@delete' );    
    Route::post('/problems/create','ProblemController@create' );
    Route::post('/problems/update','ProblemController@update' );
    Route::post('/problems/delete','ProblemController@delete' );
});
