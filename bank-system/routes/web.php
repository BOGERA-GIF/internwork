<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerDepositController;
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
});
Route::get('/customers/create', 'CustomerController@create')->name('customers.create');

Route::get('/insert-customer', [CustomerController::class, 'showInsertForm'])->name('insert-customer');
Route::post('/insert-customer', [CustomerController::class, 'insertData']);

Route::get('/insert-user', [UserController::class, 'showInsertForm'])->name('insert-user');
Route::post('/insert-user', [UserController::class, 'insertData']);


Route::middleware(['role:admin'])->group(function () {
    // Admin dashboard route
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
});

Route::middleware(['role:customer'])->group(function () {
    // Customer dashboard route
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index']);
});

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Handle login
Route::post('/login', [LoginController::class, 'login']);

// routes/web.php

// use App\Http\Controllers\CustomerController;

// Route::get('/customer-list', [CustomerController::class, 'index'])->name('customer.list');

// Route::get('/login', function () {
//     return view('auth.customer.login');
// })->name("login");
 
// // routes/web.php

// use App\Http\Controllers\Auth\LoginController;

// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::middleware(['role:customer'])->group(function () {
    // Other customer routes...

    Route::get('/customer/deposit', [CustomerDepositController::class, 'showDepositForm']);
    Route::post('/customer/deposit', [CustomerDepositController::class, 'depositFunds']);
});



Route::get('/home', [HomeController::class, 'redirect'])->name('home');

// Routes for User Management
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
});

// Routes for Customer Management
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
});