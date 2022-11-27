<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/makanan', [MakananController::class, 'index']);
Route::get('/makanan/{id}', [MakananController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/makanan', [MakananController::class, 'store'])->middleware('admin');
    Route::put('/makanan/{id}', [MakananController::class, 'update'])->middleware('admin');
    Route::delete('/makanan/{id}', [MakananController::class, 'destroy'])->middleware('admin');

    Route::get('/pesanan', [PesananController::class, 'index'])->middleware('admin');
    Route::get('/pesanan/{id}', [PesananController::class, 'show']);
    Route::post('/pesanan', [PesananController::class, 'store']);
    Route::put('/pesanan/{id}', [PesananController::class, 'update_status'])->middleware('admin');
    Route::post('/logout', [AuthController::class, 'logout']);
    });
