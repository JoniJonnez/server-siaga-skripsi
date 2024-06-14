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
Route::get('/rumah/by-id/{id}', 'App\Http\Controllers\Api\RumahApiController@by_id');
Route::post('/rumah/insert', 'App\Http\Controllers\Api\RumahApiController@insert');
Route::put('/rumah/update/{id}', 'App\Http\Controllers\Api\RumahApiController@update');
Route::delete('/rumah/delete/{id}', 'App\Http\Controllers\Api\RumahApiController@delete');

Route::get('/user/login/all', 'App\Http\Controllers\Api\UserApiController@get_all');
Route::post('/user/login', 'App\Http\Controllers\Api\UserApiController@login');
Route::post('/user/register', 'App\Http\Controllers\Api\UserApiController@register');
Route::delete('/user/delete/{id}', 'App\Http\Controllers\Api\UserApiController@delete');
Route::post('/user/pengaturan/{id}', 'App\Http\Controllers\Api\UserApiController@pengaturan');

Route::get('/informasi', 'App\Http\Controllers\Api\InformasiApiController@get_all');
Route::get('/informasi/by-id/{id}', 'App\Http\Controllers\Api\InformasiApiController@by_id');
Route::post('/informasi/insert', 'App\Http\Controllers\Api\InformasiApiController@insert');
Route::delete('/informasi/delete/{id}', 'App\Http\Controllers\Api\InformasiApiController@delete');

Route::get('/iuran/list', 'App\Http\Controllers\Api\IuranApiController@get_all');
Route::get('/iuran/by-id/{id}', 'App\Http\Controllers\Api\IuranApiController@by_id');
Route::delete('/iuran/delete/{id}', 'App\Http\Controllers\Api\IuranApiController@delete');
Route::post('/iuran/insert', 'App\Http\Controllers\Api\IuranApiController@insert');
// Route::get('/iurans', 'App\Http\Controllers\Api\IuranApiController@get_all_iuranDetails');

//pengaduan or laporan

Route::get('/pengaduan', 'App\Http\Controllers\Api\PengaduanApiController@get_all');
Route::get('/pengaduan/by-id/{id}', 'App\Http\Controllers\Api\PengaduanApiController@by_id');
Route::post('/pengaduan/insert', 'App\Http\Controllers\Api\PengaduanApiController@insert');
Route::delete('/pengaduan/delete/{id}', 'App\Http\Controllers\Api\PengaduanApiController@delete');
