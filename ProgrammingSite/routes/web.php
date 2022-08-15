<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/', [IndexController::class , 'index'])->name('home');
Route::get('/read_more/{language}', [IndexController::class, 'read_more'])->name('read_more');
Route::get('/signin' , [AuthController::class, 'Authenticate_show'])->name('signin.show'); 
Route::post('/login' , [AuthController::class, 'Login'])->name('login');
Route::post('/register' , [AuthController::class, 'Register'])->name('register');
Route::get('/logout' , [AuthController::class, 'Logout'])->name('logout');

Route::group(
    [
        'middleware'=> ['auth']
    ]
    ,function(){
        Route::get('/profile' , [UserController::class, 'Profile'])->name('profile');
        Route::get('/interests' , [UserController::class, 'Interests'])->name('interests');
        Route::get('/editInterests' , [UserController::class, 'editInterests'])->name('interests.edit');
        Route::post('/saveinterests' , [UserController::class, 'saveInterests'])->name('interests.save');
        Route::get('/dashboard' , [DashboardController::class , 'Index'])->name('dashboard');
        Route::resource('/dashboard/user', UserController::class);
    });