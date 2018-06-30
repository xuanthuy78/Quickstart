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
Route::group(['middleware' => 'loginUser'], function(){
	Route::get('task', 'TaskController@createTask');
	Route::post('task', 'TaskController@storeTask');
	Route::get('task', 'TaskController@showTask');
	Route::get('task/{id}/delete', 'TaskController@deleteTask');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
