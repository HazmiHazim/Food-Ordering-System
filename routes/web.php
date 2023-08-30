<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FoodMenu\FoodCategoryController;
use App\Http\Controllers\Admin\FoodMenu\FoodMenuController;
use App\Http\Controllers\Admin\Partnership\PartnershipController;
use App\Http\Controllers\Admin\StaffAccount\StaffAccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');


// Route for login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route for logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route for registration
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');

// Route for admin
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Staff account module
    Route::resource('/staff-account', StaffAccountController::class)->names([
        'index' => 'staff-account',
        'create' => 'staff-account-create',
        'show' => 'staff-account-show',
        'edit' => 'staff-account-edit',
    ]);

    // Route for search in staff account module
    Route::get('/staff-search-index', [StaffAccountController::class, 'search_index'])->name('staff-account-search-index');
    Route::get('/staff-search-create', [StaffAccountController::class, 'search_create'])->name('staff-account-search-create');

    // Food menu module
    Route::resource('/food-menu', FoodMenuController::class)->names([
        'index' => 'food-menu',
        'create' => 'food-menu-create',
        'show' => 'food-menu-show',
        'edit' => 'food-menu-edit',
    ]);

    Route::post('/food-menu/create', [FoodCategoryController::class, 'store'])->name('category');
    Route::get('/food-search-index', [FoodMenuController::class, 'search_create'])->name('food-menu-search-create');

    // Partnership module
    Route::resource('/partnership', PartnershipController::class)->names([
        'index' => 'partnership',
        'create' => 'partnership-create',
        'show' => 'partnership-show',
        'edit' => 'partnership-edit',
    ]);
});
