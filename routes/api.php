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

Route::get('apartments-api', function () {
    return response([Apartment::all()],200);
});

//Route::get('apartments/{apartment}', function ($apartmentId) {
//    return response(Apartment::find($apartmentId), 200);
//});
//
//
//Route::post('apartments', function(Request $request) {
//    $resp = Apartment::create($request->all());
//    return  $resp;
//});
//
//Route::put('apartments/{apartment}', function(Request $request, $apartmentId) {
//    $apartment = Apartment::findOrFail($apartmentId);
//    $apartment->update($request->all());
//    return $apartment;
//});
//
//Route::delete('apartments/{apartment}',function($apartmentId) {
//    Apartment::find($apartmentId)->delete();
//    return 204;
//});



