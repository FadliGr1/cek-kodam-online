<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KodamController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\ProfileController;

Route::get('/', [KodamController::class, 'index']);
Route::post('/check-kodam', [KodamController::class, 'store']);
Route::get('/kodam/{name}', [KodamController::class, 'show']);
Route::post('/chat', [ChatGPTController::class, 'chat']);
Route::get('/profile/{name}', [ProfileController::class, 'show']);
