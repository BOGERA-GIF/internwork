<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
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

// routes/web.php

// use App\Http\Controllers\CustomerController;

// Route::get('/customer-list', [CustomerController::class, 'index'])->name('customer.list');

// Route::get('/login', function () {
//     return view('auth.customer.login');
// })->name("login");
 
// // routes/web.php

// use App\Http\Controllers\Auth\LoginController;

// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/', [HomeController::class, 'index'])->name('home');

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