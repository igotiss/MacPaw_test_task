<?php

use Illuminate\Support\Facades\Route;

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

// ** task 1 **

Route::get('/', function () {
    return response()->json([
        'hello' => 'MacPaw Internship 2022!'
    ]);
});


// ** task 3 **

Route::get('/neo/hazardous', [\App\Http\Controllers\NearEarthObjectController::class , 'index']);


// ** task 4 **

Route::get('/neo/fastest', [\App\Http\Controllers\NearEarthObjectController::class , 'fastest']);

// ** Additional task **
Route::get('/nasa/get', [\App\Http\Controllers\NearEarthObjectController::class , 'getNasaData']);

