<?php

use App\Http\Controllers\AttendeesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Basic landing page route
Route::get('/', function () {
    return view('welcome');
});
// Route to register user
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');

// Route to handle the login form submission
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

// Route for all CRUD operations on user profile for auth users
Route::resource('/profile', ProfileController::class)->middleware('auth');

// Route to show a user profile
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// Route to attendees view
Route::get('/attendees', [AttendeesController::class, 'index']);
