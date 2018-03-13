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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/apartments', 'ApartmentController@index');
Route::get('/apartments/create', 'ApartmentController@create');
Route::post('/apartments/create', 'ApartmentController@store');
Route::get('/apartments/{id}', 'ApartmentController@show');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/create', 'TaskController@store');
Route::get('/tasks/{id}', 'TaskController@show');