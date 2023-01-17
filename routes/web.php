<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('user/{client_id}', [HomeController::class, "show"])->name("user.show");
