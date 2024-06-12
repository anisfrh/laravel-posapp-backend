<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProdukApiController;
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

// Route::controller(AuthController::class)->group(function(){
//     Route::post('/register', 'register');
//     Route::post('/login', 'login');
//     Route::post('/logout', 'logout');
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Produk API
Route::apiResource('products', ProdukApiController::class)->middleware('auth:sanctum');

// Order API
Route::apiResource('orders', OrderApiController::class)->middleware('auth:sanctum');
