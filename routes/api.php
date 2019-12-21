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

//Route::post('/register', "JwtController@register");


Route::group(["middleware" => "auth:api"], function () {
    Route::get ("/me", "JwtController@me");
    //genre routing
    Route::post('/genres','GenreController@create');
    Route::put('/genres/{label}','GenreController@update');
    Route::delete('/genres/{label}','GenreController@delete');
    Route::post('/topics','TopicController@create');
    Route::put('/topics/{topic_id}','TopicController@update');
    Route::delete('/topics/{topic_id}','TopicController@delete');
    Route::post('/tasks','TaskController@create');
    Route::put('/tasks/{task_id}','TaskController@update');
    Route::delete('/tasks/{task_id}','TaskController@delete');

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

Route::get('/genres','GenreController@index');
Route::get('/genres/{label}','GenreController@find');
Route::get('/genres/all/topics','GenreController@indexWithTopics');
Route::get('/genres/{label}/topics','GenreController@findWithTopics');
Route::get('/topics','TopicController@index');
Route::get('/topics/{topic_id}','TopicController@find');
Route::get('/topics/{topic_id}/tasks','TopicController@findWithTasks');
Route::get('/tasks','TaskController@index');
Route::get('/tasks/{task_id}','TaskController@find');
Route::get('/tags','TagController@index');
Route::get('/tags/tasks/{task_id}','TagController@find');
