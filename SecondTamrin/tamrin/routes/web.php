<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IndexController;
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
Route::resource('games', GameController::class);
Route::resource('companies' , CompanyController::class);
Route::get('/companyshow/{company}' , [IndexController::class , 'companyshow']) -> name('companyshow');
Route::get('/gameshow/{game}' , [IndexController::class , 'gameshow']) -> name('gameshow');

