<?php

use App\Http\Controllers\Api\v1\LabelController;
use App\Http\Controllers\Api\v1\PriorityController;
use App\Http\Controllers\Api\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\OriginController;
use App\Http\Controllers\Api\v1\AuthController;

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



Route::group(['as' => 'auth.'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login',    [AuthController::class, 'login'])->name('login');

    # Logout requires being authenticated, so needs auth sanctum middleware check.
    Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
});


Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum', 'as' => 'api_v1.'], function () {

    Route::apiResource('origin', OriginController::class);
    Route::apiResource('priority', PriorityController::class);
    Route::apiResource('label', LabelController::class);
    Route::apiResource('task', TaskController::class);

});
