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

Route::get('/api/apartments','ApartmentAPIController@index');
Route::get('/api/tasks','TaskAPIController@index');

Route::get('/apartments', 'ApartmentController@index');
Route::get('/apartments/create', 'ApartmentController@create');
Route::post('/apartments/create', 'ApartmentController@store');
Route::get('/apartments/{id}', 'ApartmentController@show')->name('show apartment');
//Route::resource('apartments','ApartmentController');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::post('/tasks/create', 'TaskController@store');
Route::get('/tasks/{id}', 'TaskController@show')->name('show task');
// Route::resource('tasks', 'TaskController');

Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::get('/reservations/create/{id}', 'ReservationController@create');
Route::post('/reservations/create', 'ReservationController@store');
Route::get('/reservations/{id}', 'ReservationController@show')->name('show reservation');

// form routes optimization via resource fn - will generate all routes from the controller according to naming convention

// Route::get('/form', 'FormController@index');
// Route::get('/form/create', 'FormController@create');
// Route::get('/form/{id}', 'FormController@show');
// Route::post('/form', 'FormController@store');
//Route::get('/form/{id}/edit', 'FormController@edit');

Route::resource('form', 'FormController');
Route::get('/form/create/{id}', 'FormController@create');

Route::get('support/categories','CategoryController@create');
Route::post('support/categories','CategoryController@store');

Route::get('support/roles','RoleController@create');
Route::post('support/roles','RoleController@store');

Route::get('support/statuses','StatusController@create');
Route::post('support/statuses','StatusController@store');
