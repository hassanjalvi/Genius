<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/user/register', [UserController::class, 'registerUser'])->name('register');
Route::post('/user/login', [UserController::class, 'loginUser'])->name('login');
Route::post('/user/logout', [UserController::class, 'logoutuser'])->name('logout');

#userside
Route::get('/user/register', [UserController::class, 'showRegister'])->name('register.form');
// Route::post('/register/user', [UserController::class, 'onRegister'])->name('register');
Route::get('/user/login', [UserController::class, 'showLogin'])->name('login.form');
// Route::post('/login/user', [UserController::class, 'onLogin'])->name('login');
Route::get('/', [UserController::class, 'index'])->name('Home');
Route::get('/about', [UserController::class, 'showAbout'])->name('About');
Route::get('/check-out', [PaymentController::class, 'showCheckout'])->name('Checkout');

//use admin.dashboard and parent.dashboard for route name for parent and admin
