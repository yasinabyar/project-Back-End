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
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    Route::middleware('role:admin,customs_officer')->group(function () {
        Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->middleware('role:clearer');
    });

    Route::middleware('role:deliverer')->group(function () {
        Route::post('/deliver/{productId}', [\App\Http\Controllers\DeliveryController::class, 'store']);
    });

});
