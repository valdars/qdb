<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'NewsController@index');
});

Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/', 'AdminController@index');
});

Route::group(['middleware' => 'web', 'prefix' => 'quotes'], function () {

    Route::get('/', 'QuoteController@index');
    Route::get('quote/{id}', 'QuoteController@view');
    Route::get('top', 'QuoteController@top');
    Route::match(['get', 'post'], 'add', 'QuoteController@add');
    Route::get('rate', 'QuoteController@rate');
});
