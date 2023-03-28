<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListingController;
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

Route::resource('listing', ListingController::class)->only(['index', 'show']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('register', [UserController::class, 'create'])->name('user');
Route::post('user', [UserController::class, 'store'])->name('user.store');

Route::prefix('user-account')->name('user-account.')->middleware('auth')->group(function () {
  Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
  Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::get('setting', [SettingController::class, 'edit'])->name('setting');
  Route::post('setting', [SettingController::class, 'update'])->name('setting.update');

  Route::put('my-listing/{listing}/restore', [UserListingController::class, 'restore'])
    ->name('my-listing.restore')->withTrashed();
  Route::resource('my-listing', UserListingController::class)->parameters(['my-listing' => 'listing'])
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->withTrashed();
});
