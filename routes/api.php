<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ProblemController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::prefix('question_bank')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('pools', PoolController::class);
    Route::apiResource('pools.problems', ProblemController::class);
});
