<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FoodMenu\FoodCategoryController;
use App\Http\Controllers\Admin\FoodMenu\FoodMenuController;
use App\Http\Controllers\Admin\Partnership\PartnershipController;
use App\Http\Controllers\Admin\PromotionDiscount\PromotionDiscountController;
use App\Http\Controllers\Admin\PromotionDiscount\PromotionEventController;
use App\Http\Controllers\Admin\Restaurant\ItemCategoryController;
use App\Http\Controllers\Admin\Restaurant\RestaurantController;
use App\Http\Controllers\Admin\Settings\AdminProfileController;
use App\Http\Controllers\Admin\StaffAccount\StaffAccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Staff\Order\OrderControler;
use App\Http\Controllers\Staff\Profile\StaffProfileController;
use App\Http\Controllers\Staff\Reservation\ReservationController;
use App\Http\Controllers\Staff\StaffController;
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


// Public Route
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/promotion', [PublicController::class, 'promotion'])->name('promotion');
Route::get('/reservation', [PublicController::class, 'reservation'])->name('reservation');

// Add to cart
Route::post('/menu/create-order', [PublicController::class, 'createOrder'])->name('create-order');

// Search
Route::get('/search', [PublicController::class, 'search'])->name('search');

// Make reservation
Route::post('/reservation/create', [PublicController::class, 'makeReservation'])->name('create-reservation');


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
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

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

    Route::post('/food-menu/create', [FoodCategoryController::class, 'store'])->name('food-category');
    Route::delete('/food-category-delete/{id}', [FoodCategoryController::class, 'destroy'])->name('food-category-delete');
    Route::get('/food-search-index', [FoodMenuController::class, 'search_index'])->name('food-menu-search-index');
    Route::get('/food-search-create', [FoodMenuController::class, 'search_create'])->name('food-menu-search-create');

    // Restaurant module
    Route::resource('/restaurant', RestaurantController::class)->names([
        'index' => 'restaurant',
        'create' => 'restaurant-create',
        'show' => 'restaurant-show',
        'edit' => 'restaurant-edit',
    ]);

    Route::post('/restaurant/create', [ItemCategoryController::class, 'store'])->name('item-category');
    Route::delete('/item-category-delete/{id}', [ItemCategoryController::class, 'destroy'])->name('item-category-delete');

    // Partnership module
    Route::resource('/partnership', PartnershipController::class)->names([
        'index' => 'partnership',
        'create' => 'partnership-create',
        'edit' => 'partnership-edit',
    ]);

    // Promotion and discount module
    Route::resource('/promotion-discount', PromotionDiscountController::class)->names([
        'index' => 'promotion-discount',
        'create' => 'promotion-discount-create',
        'show' => 'promotion-discount-show',
        'edit' => 'promotion-discount-edit',
    ]);

    Route::post('/promotion-discount/create', [PromotionEventController::class, 'store'])->name('promotion-event');

    // Setting Profile
    Route::get('/settings', [AdminProfileController::class, 'adminProfile'])->name('admin-profile');
    Route::put('/settings/update-profile/{id}', [AdminProfileController::class, 'updateProfile'])->name('update-admin-profile');
    Route::put('/settings/update-password/{id}', [AdminProfileController::class, 'updatePassword'])->name('update-admin-password');
});

// Route for staff
Route::prefix('staff')->middleware('auth', 'isStaff')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'index'])->name('staff-dashboard');

    // Profile module
    Route::resource('/staff-profile', StaffProfileController::class)->names([
        'show' => 'staff-profile-show',
        'edit' => 'staff-profile-edit',
    ]);

    // Order module
    Route::resource('/customer-order', OrderControler::class)->names([
        'index' => 'customer-order',
        'create' => 'customer-order-create',
        'show' => 'customer-order-show',      // Not used yet
        'edit' => 'customer-order-edit',      // Not used yet
    ]);

    Route::put('/customer-order/update-order/{id}', [OrderControler::class, 'updateStatus'])->name('update-order');


    // Reservation module
    Route::resource('/customer-reservation', ReservationController::class)->names([
        'index' => 'customer-reservation',
        'create' => 'customer-reservation-create',
        'show' => 'customer-reservation-show',
        'edit' => 'customer-reservation-edit',
    ]);
});
