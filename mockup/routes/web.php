<?php

use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Eventcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Route root URL ("/") to the login view (login.blade.php)
Route::get('/', function () {
    return view('login'); // This makes login.blade.php the home page
})->name('home');

// Authentication routes generated by Laravel (login, registration, etc.)
Auth::routes(); // Enables default Laravel authentication routes

/*
|--------------------------------------------------------------------------
| Custom Authentication Routes
|--------------------------------------------------------------------------
|
| Define custom routes for login, registration, and logout with specific 
| controllers and methods. This structure allows customization of each
| authentication-related view.
|
*/

// Custom Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Custom Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

/*
|--------------------------------------------------------------------------
| Protected Routes - Require Authentication
|--------------------------------------------------------------------------
|
| Protect certain routes using the "auth" middleware to restrict access
| to authenticated users only. The routes include access to the main
| dashboard and user profile.
|
*/

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Main User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile Section in Dashboard
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard Route - Requires Authentication
|--------------------------------------------------------------------------
|
| Restrict access to the admin dashboard with the "auth" middleware. Only
| authenticated users can access the admin dashboard by going to /admindash.
|
*/

Route::get('/admindash', [AdminDashBoardController::class, 'index'])
     ->name('admindash')
     ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Home Route for Authenticated Users
|--------------------------------------------------------------------------
|
| Define the home route that takes authenticated users to the homepage.
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

// calendar

// Route to load the calendar view directly
Route::view('/calendar', 'calendar')->name('calendar.index');

// API routes for handling calendar events
Route::get('/calendar/events', [EventController::class, 'fetch'])->name('calendar.fetch');  // Fetch all events
Route::post('/calendar/events', [EventController::class, 'store'])->name('calendar.store');  // Create a new event
Route::delete('/calendar/events/{id}', [EventController::class, 'destroy'])->name('calendar.destroy');  // Delete an event

