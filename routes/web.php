<?php

use App\Http\Controllers\AttendeesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SearchController;

// Basic landing page route
Route::get('/', [WelcomeController::class, 'index']);

Route::get('/registration', function () {
    return view('registration');
})->middleware('guest')->name('registration');

// Route to handle the registration form submission
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');

// Route to view login
Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

// Route to handle the login form submission
Route::post('/login', [LoginController::class, 'login']);

// Route to logout user
Route::post('/logout', LogoutController::class, 'logout')->name('logout');

// Route to search for profiles.
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Route to show a user profile
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// Route for all CRUD operations on user profile for auth users
Route::resource('/profile', ProfileController::class, ['parameters' => ['profile' => 'profile']])->except(['show']);

// Auth middleware grouping for specific routes
Route::middleware(['auth'])->group(function () {
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/tag/{tag}/toggle', [TagController::class, 'toggle'])->name('tag.toggle');
    /* Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store'); */
});

// Route to attendees view
Route::get('/attendees', [AttendeesController::class, 'index'])->name('attendees');
