<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index']);

Route::resource('listing', ListingController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');
Route::resource('listing', ListingController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('register', [UserController::class, 'create'])->name('user');
Route::post('user', [UserController::class, 'store'])->name('user.store');
