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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('auth/register','Auth\RegisterController@showRegistrationForm' );
// Route::post('auth/register','Auth\RegisterController@register' );
// Route::get('auth/login','Auth\LoginController@showLoginForm' );
// Route::post('auth/login','Auth\LoginController@login' );
// Route::get('auth/logout','Auth\LoginController@logout' );

Route::get('/fields','FieldController@index' );
//Route::post('/fields/create','FieldController@create');
Route::get('/fields/{field}','FieldController@edit');
Route::get('/fields/find/{label}','FieldController@find');

Route::get('/domains','DomainController@index' );
Route::get('/domains/{label}','DomainController@labelfind' );
Route::get('/domains/find/{id}','DomainController@find' );

Route::get('/problems/find/{id}','ProblemController@find' );

//Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
