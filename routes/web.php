<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/register',[UserController::class,'showRegister'] )->name('register.form');
// Route::post('/register/user', [UserController::class, 'onRegister'])->name('register');
Route::get('/user/login',[UserController::class,'showLogin'] )->name('login.form');
// Route::post('/login/user', [UserController::class, 'onLogin'])->name('login');