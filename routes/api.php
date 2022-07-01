<?php

use App\Http\Controllers\kategoriContoller;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'UserController@login')->name('login');
Route::post('/register', 'UserController@register')->name('register');

Route::middleware('auth:sanctum')->post('/logout',[UserController::class , 'logout']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->apiResource('produk' , SoalController::class);

Route::middleware('auth:sanctum')->apiResource('kategori' , kategoriContoller::class);

