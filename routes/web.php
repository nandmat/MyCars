<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoutesAuthController;
use App\Http\Controllers\UserController;
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





//Routes Auth
Route::prefix('/')->group(function(){
    Route::get('/', [RoutesAuthController::class, 'pageLogin'])->name('auth.login');
    Route::post('/', [AuthController::class, 'auth'])->name('auth.login.auth');
    Route::get('/page/register', [RoutesAuthController::class, 'register'])->name('register.page');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});

Route::get('/dashboard', [RoutesAuthController::class, 'pageDash'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
