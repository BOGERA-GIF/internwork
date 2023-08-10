<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerDepositController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\AuthenticatesCustomers;
use App\Http\Controllers\DepositController;
// use Illuminate\Support\Facades\Auth;
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
// Route::get('/customers/create', 'CustomerController@create')->name('customers.create');

Route::get('/insert-customer', [CustomerController::class, 'showInsertForm'])->name('insert-customer');
Route::post('/insert-customer', [CustomerController::class, 'insertData']);

Route::get('/insert-user', [UserController::class, 'showInsertForm'])->name('insert-user');
Route::post('/insert-user', [UserController::class, 'insertData']);


// Route::middleware(['role:admin'])->group(function () {
//     // Admin dashboard route
//     Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard']);
// });

// Route::middleware(['role:customer'])->group(function () {
//     // Customer dashboard route
//     Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index']);
// });


// Route::get('/customer/login', [CustomerController::class, 'showLoginForm'])->name('customer.login');
// Route::post('/customer/login', [CustomerController::class, 'login']);

// Show login form
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Handle login
// Route::post('/login', [LoginController::class, 'login']);

// routes/web.php

// use App\Http\Controllers\CustomerController;

// Route::get('/customer-list', [CustomerController::class, 'index'])->name('customer.list');

// Route::get('/login', function () {
//     return view('auth.customer.login');
// })->name("login");
 
// // routes/web.php

// use App\Http\Controllers\Auth\LoginController;

// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
// Route::middleware(['role:customer'])->group(function () {
//     // Other customer routes...

//     Route::get('/customer/deposit', [CustomerDepositController::class, 'showDepositForm']);
//     Route::post('/customer/deposit', [CustomerDepositController::class, 'depositFunds']);
// });

Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('/user/login', [UserController::class, 'login'])->name('users.login.submit');
Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('users.register');
Route::post('/user/register', [UserController::class, 'register'])->name('users.register.submit');
Route::middleware(['auth:users'])->group(function () {
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');
    // Add other user-specific routes here
});

// Customer Login
Route::get('customer/login', [CustomerController::class, 'showLoginForm'])->name('customers.login');
Route::post('customer/login',  [CustomerController::class, 'login'])->name('customers.login.submit');
Route::get('customer/register',  [CustomerController::class, 'showRegistrationForm'])->name('customers.register');
Route::post('customer/register',  [CustomerController::class, 'register'])->name('customers.register.submit');
Route::middleware(['auth:customers'])->group(function () {
Route::get('customer/dashboard',  [CustomerController::class, 'dashboard'])->name('customers.dashboard');
});
Route::post('/customer/logout',  [CustomerController::class, 'logout'])->name('customers.logout');





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


// customers balance
Route::middleware(['auth:customers'])->group(function () {
    Route::get('/customer/view_balance', [CustomerController::class, 'viewBalance'])
        ->name('customers.view_balance');
});
// Route::get('customer/view_balance', [CustomerController::class, 'viewBalance'])->name('customers.view_balance');
// });
// Route::post('/customer/balance', [CustomerController::class, 'viewBalance'])->name('customers.view_balance');
//customer's deposit
Route::get('/customer/deposit', [CustomerController::class, 'showDepositForm'])->name('customers.show_depositForm');
Route::post('/customer/deposit', [CustomerController::class, 'processDeposit'])->name('customers.process_deposit');

// withdrawing from the bank_account to the mobile money account
Route::get('/customer/withdraw', [CustomerController::class, 'showWithdrawForm'])->name('customers.show_withdraw_form');
Route::post('/customer/withdraw', [CustomerController::class, 'processWithdraw'])->name('customers.process_withdraw');

//showing the customer_transactions
// Route::get('/customer/account-statement', [CustomerController::class, 'showAccountStatement'])->name('customers.account_statement');
// Auth::routes();

Route::middleware(['auth:customers'])->group(function () {
    Route::get('/customer/account-statement', [CustomerController::class, 'showAccountStatement'])
        ->name('customers.account_statement');
    // Add other authenticated routes here
});
