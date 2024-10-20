<?php

use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use Spyframe\lib\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/api/contact', [ContactController::class, 'create']);

Route::start();
