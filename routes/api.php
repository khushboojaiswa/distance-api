<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinateController;

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

Route::post('/coordinates', [CoordinateController::class, 'save']);
Route::put('/coordinates/{id}', [CoordinateController::class, 'update']);
Route::delete('/coordinates/{id}', [CoordinateController::class, 'softDelete']);
Route::get('/coordinates', [CoordinateController::class, 'viewAll']);

