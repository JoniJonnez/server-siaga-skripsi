<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rumah', 'App\Http\Controllers\Api\RumahApiController@get_all');
Route::get('/rumah/by_id/{id}', 'App\Http\Controllers\Api\RumahApiController@by_id');
Route::post('/rumah/insert', 'App\Http\Controllers\Api\RumahApiController@insert');
Route::put('/rumah/update/{id}', 'App\Http\Controllers\Api\RumahApiController@update');
Route::delete('/rumah/delete/{id}', 'App\Http\Controllers\Api\RumahApiController@delete');

Route::post('/user/login', 'App\Http\Controllers\Api\UserApiController@login');