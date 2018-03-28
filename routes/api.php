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
//This was done by Laravel Auth default
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


////All the routes for apartments
//Route::get('api/apartments', function () {
//    return response([Apartment::all()],200);
//});
//
//Route::get('api/apartments/{apartment}', function ($apartmentId) {
//    return response(Apartment::find($apartmentId), 200);
//});
//
//
//Route::post('api/apartments', function(Request $request) {
//    $resp = Apartment::create($request->all());
//    return  $resp;
//});
//
//Route::put('api/apartments/{apartment}', function(Request $request, $apartmentId) {
//    $apartment = Apartment::findOrFail($apartmentId);
//    $apartment->update($request->all());
//    return $apartment;
//});
//
//Route::delete('api/apartments/{apartment}',function($apartmentId) {
//    Apartment::find($apartmentId)->delete();
//    return 204;
//});
//
//
////All the routes for tasks
//Route::get('api/tasks', function () {
//    return response([Task::all()],200);
//});
//
//Route::get('api/tasks/{task}', function ($taskId) {
//    return response(Task::find($taskId), 200);
//});
//
//
//Route::post('api/tasks', function(Request $request) {
//    $resp = Task::create($request->all());
//    return  $resp;
//});
//
//Route::put('api/tasks/{task}', function(Request $request, $taskId) {
//    $task = Task::findOrFail($taskId);
//    $task->update($request->all());
//    return $task;
//});
//
//Route::delete('api/tasks/{task}',function($taskId) {
//    Task::find($taskId)->delete();
//    return 204;
//});



/**
 **Basic Routes for a RESTful service:
 **Route::get($uri, $callback);
 **Route::post($uri, $callback);
 **Route::put($uri, $callback);
 **Route::delete($uri, $callback);
 **
 */


Route::get('api/apartments', 'ApartmentAPIController@index');

Route::get('api/apartments/{apartment}', 'ApartmentAPIController@show');

Route::post('api/apartments','ApartmentAPIController@store');

Route::put('api/apartments/{apartment}','ApartmentAPIController@update');

Route::delete('apartments/{apartment}', 'ApartmentAPIController@delete');


Route::get('api/tasks', 'TaskAPIController@index');

Route::get('api/tasks/{task}', 'TaskAPIController@show');

Route::post('api/tasks','TaskAPIControllerr@store');

Route::put('api/tasks/{task}','TaskAPIController@update');

Route::delete('tasks/{task}', 'TaskAPIController@delete');