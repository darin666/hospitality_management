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


// DONT TOUCH THIS
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/apartments', 'ApartmentController@index')->middleware('auth');
Route::get('/apartments/create', 'ApartmentController@create')->middleware('auth');
Route::post('/apartments/create', 'ApartmentController@store');
Route::get('/apartments/{id}', 'ApartmentController@show')->name('show apartment')->middleware('auth');
//Route::resource('apartments','ApartmentController');

Route::get('/tasks', 'TaskController@index')->middleware('auth');
Route::get('/tasks/create', 'TaskController@create')->middleware('auth');
Route::post('/tasks/create', 'TaskController@store');
Route::get('/tasks/{id}', 'TaskController@show')->name('show task')->middleware('auth');
// Route::resource('tasks', 'TaskController');

Route::get('/reservations', 'ReservationController@index')->middleware('auth');
Route::get('/reservations/create', 'ReservationController@create')->middleware('auth');
Route::get('/reservations/create/{id}', 'ReservationController@create')->middleware('auth');
Route::post('/reservations/create', 'ReservationController@store');
Route::get('/reservations/{id}', 'ReservationController@show')->name('show reservation')->middleware('auth');

// form routes optimization via resource fn - will generate all routes from the controller according to naming convention

// Route::get('/form', 'FormController@index');
// Route::get('/form/create', 'FormController@create');
// Route::get('/form/{id}', 'FormController@show');
// Route::post('/form', 'FormController@store');
// Route::get('/form/{id}/edit', 'FormController@edit');

Route::resource('form', 'FormController')->middleware('auth');
Route::get('/form/create/{id}', 'FormController@create')->middleware('auth');

Route::get('support/categories','CategoryController@create')->middleware('auth');
Route::post('support/categories','CategoryController@store');

Route::get('support/roles','RoleController@create')->middleware('auth');
Route::post('support/roles','RoleController@store');

Route::get('support/statuses','StatusController@create')->middleware('auth');
Route::post('support/statuses','StatusController@store');

// route for events = Calendar
Route::resource('events', 'EventController')->middleware('auth');
Route::post('events/store', 'EventController@store');

Route::post('upload/{id}', 'TaskController@upload');
