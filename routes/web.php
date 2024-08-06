<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FoodItemsController;
use App\Http\Controllers\frontend\MenuController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('AlreadyLoggedIn');
Route::get('/registration', [AuthController::class, 'registration'])->name('register')->middleware('AlreadyLoggedIn');

Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('/fooditems', [FoodItemsController::class, 'index'])->name('fooditems.index');
Route::get('/fooditems/create', [FoodItemsController::class, 'create'])->name('fooditems.create');
Route::post('/fooditems', [FoodItemsController::class, 'store'])->name('fooditems.store');
Route::get('/fooditems/{fooditem}/edit', [FoodItemsController::class, 'edit'])->name('fooditems.edit');
Route::put('/fooditems/{fooditem}', [FoodItemsController::class, 'update'])->name('fooditems.update');
Route::delete('/fooditems/{fooditem}', [FoodItemsController::class, 'destroy'])->name('fooditems.destroy');

Route::get('/menu/{table_id}', [MenuController::class, 'index'])->name('menu.index');
Route::get('/product/{fooditem}', [MenuController::class, 'product'])->name('product.index');

Route::post('/add-to-cart', [CartController::class, 'addProduct']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/delete-cart-item', [CartController::class, 'deleteProduct']);
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');

Route::get('/place-order', [OrdersController::class, 'placeOrder'])->name('order.place');
Route::get('/my-orders', [OrdersController::class, 'userIndex'])->name('userOrder.show');
Route::get('/my-order-details/{id}', [OrdersController::class, 'myOrderDetails'])->name('myOrder.details');

Route::get('/orders', [OrdersController::class, 'adminIndex'])->name('adminOrder.show');
Route::get('/orders/details/{id}', [OrdersController::class, 'adminDetails'])->name('adminOrder.details');
Route::post('/update-status', [OrdersController::class, 'updateStatus']);

Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
Route::get('/tables/create', [TableController::class, 'create'])->name('tables.create');
Route::post('/tables', [TableController::class, 'store'])->name('tables.store');
Route::get('/tables/{table}', [TableController::class, 'destroy'])->name('tables.destroy');
Route::get('/tables/details/{id}', [TableController::class, 'details'])->name('tables.details');

Route::post('/like', [RatingController::class, 'addLike']);
