<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PortalJobController;
use App\Http\Controllers\Api\ApplicationController;

Route::middleware(['auth:sanctum'])->get('/user', [AuthController::class, 'user']);


Route::middleware('auth:sanctum')->group(function () {


    // Application Routes
    Route::apiResource('applications', ApplicationController::class);
});
// Company Routes
Route::apiResource('companies', CompanyController::class);

// PortalJob Routes
Route::apiResource('portal-jobs', PortalJobController::class);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
