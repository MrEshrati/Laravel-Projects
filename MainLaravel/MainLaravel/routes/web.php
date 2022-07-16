<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDigitalContentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\CartItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class , 'index']) -> name('home');

Route::get('/login' , [AuthController::class , 'login_show']) -> name('login.show');
Route::post('/login' , [AuthController::class , 'login']) -> name('login');

Route::get('/register' , [AuthController::class , 'register_show']) -> name('register.show');
Route::post('/register' , [AuthController::class , 'register']) -> name('register');

Route::get('/logout' , [AuthController::class , 'logout']) -> name('logout');

Route::group(
    [
        'middleware'=> ['auth']
    ]
    ,function(){
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::resource('transactions', TransactionController::class) -> middleware('role:Admin');
        Route::post('/transactions/checkout' , [TransactionController::class , 'Checkout']) -> name('checkout');
        Route::resource('digitalproducts', ProductController::class) -> middleware('role:Admin');
        Route::resource('categories' , CategoryController::class) -> middleware('role:Admin');
        Route::resource('users' , UserController::class) -> middleware('role:Admin'); 
        Route::get('/cart', [CartItemController::class , 'index'])->name('cart');
        Route::get('/cart/add/{digitalContent}', [CartItemController::class , 'add'])->name('addCart');
        Route::get('/cart/decrease/{digitalContent}', [CartItemController::class , 'Decrease_Count'])->name('cart.decrease');
        Route::get('/cart/delete/{digitalContent}', [CartItemController::class , 'DeleteItem'])->name('cart.delete');
        Route::get('/admintransactions/{user}', [TransactionController::class , 'AdminTransaction'])->name('adminTran')->middleware('role:Admin');
    });

Route::get('/{digitalproduct}' , [IndexController::class , 'read_more']) -> name('read_more');
