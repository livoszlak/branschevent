<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Basic landing page route
Route::get('/', function () {
    return view('welcome');
});
// Route to register user
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Route to handle the login form submission
Route::post('/login', [LoginController::class, 'login']);
// Route to view the dashboard??
Route::get('/dashboard', function () {
    return view('dashboard');
});

