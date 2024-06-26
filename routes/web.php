<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
})->name('welcome');
Auth::routes();

Route::controller(LoginController::class)->group(function () {
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('Admin.dashboard');
    //Customer Admin
    Route::get('admin/viewUsers', [App\Http\Controllers\AdminController::class, 'viewUsers'])->name('Admin.viewUsers');
    Route::get('/admin/customer/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('admin.editCustomer');
    Route::get('/admin/customer/{customer}/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('Admin.createCustomer');
    Route::post('/admin/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('Admin.storeCustomer');
    Route::delete('/admin/customer/{customer}/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('Admin.destroyCustomer');
    Route::put('/admin/customer/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('Admin.updateCustomer');

    //Restaurants Admin
    Route::get('admin/viewRestaurants', [App\Http\Controllers\AdminController::class, 'viewRestaurants'])->name('Admin.viewRestaurants');
    Route::get('/admin/restaurant/{restaurant}/edit', [App\Http\Controllers\RestaurantController::class, 'editRestaurant'])->name('admin.editRestaurant');
    Route::get('/admin/restaurant/{restaurant}/create', [App\Http\Controllers\RestaurantController::class, 'create'])->name('Admin.createRestaurant');
    Route::post('/admin/restaurant/store', [App\Http\Controllers\RestaurantController::class, 'store'])->name('Admin.storeRestaurant');
    Route::put('/admin/restaurant/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'update'])->name('Admin.updateRestaurant');
    Route::delete('/admin/restaurant/{restaurant}/delete', [App\Http\Controllers\RestaurantController::class, 'destroy'])->name('Admin.destroyRestaurant');

});


Route::middleware(['auth', 'user-access:Customer'])->group(function () {
    Route::get('/customer/dashboard', [App\Http\Controllers\HomeController::class, 'customer'])->name('Customer.dashboard');
    Route::get('/customer/{restaurant}/items', [App\Http\Controllers\CustomerController::class, 'resturantItems'])->name('Customer.resturantitems');
    Route::post('/customer/cart/add/{item}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('Customer.addToCart');
    Route::get('/customer/cart/view/{customer}', [App\Http\Controllers\CartController::class, 'viewCart'])->name('Customer.viewcart');
    Route::get('/customer/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('Customer.checkout');

});


Route::middleware(['auth', 'user-access:Restaurants'])->group(function () {
    Route::get('/restaurants/dashboard', [App\Http\Controllers\HomeController::class, 'restaurants'])->name('Restaurants.dashboard');
    Route::get('/restaurants/{restaurant}/profile', [App\Http\Controllers\RestaurantController::class, 'show'])->name('Restaurants.show');
    Route::get('/restaurants/{restaurant}/edit', [App\Http\Controllers\RestaurantController::class, 'editRestaurant'])->name('Restaurants.editRestaurant');
    Route::get('/restaurants/{restaurant}/create', [App\Http\Controllers\RestaurantController::class, 'create'])->name('Restaurants.createRestaurant');
    Route::post('/restaurant/store', [App\Http\Controllers\RestaurantController::class, 'store'])->name('Restaurants.storeRestaurant');
    Route::put('/restaurant/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'update'])->name('Restaurants.updateRestaurant');
    Route::delete('/restaurant/{restaurant}/delete', [App\Http\Controllers\RestaurantController::class, 'destroy'])->name('Restaurant.destroy');

    Route::prefix('/restaurant/item/')->group(function () {
        Route::get('create', [App\Http\Controllers\ItemController::class, 'create'])->name('Item.create');
        Route::post('store', [App\Http\Controllers\ItemController::class, 'store'])->name('Item.store');
        Route::get('/change-availability/{item}', [App\Http\Controllers\ItemController::class, 'changeAvailability'])->name('Item.changeavailability');

    });

});
