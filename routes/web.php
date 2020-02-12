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

Route::get('todos', 'TodoController@index');
Route::get('todos/edit/{todo}', 'TodoController@edit');
Route::post('todos', 'TodoController@store');
Route::put('todos/{todo}', 'TodoController@update');
Route::put('todos/completed/{todo}', 'TodoController@completed');
Route::delete('todos/{todo}', 'TodoController@destroy');
