<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CONTROLLER
use App\Http\Controllers\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiController::class, 'index']);
Route::get('/transactions/{user}', [ApiController::class, 'show']);
