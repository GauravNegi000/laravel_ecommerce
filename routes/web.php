<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User;
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

// index route
Route::get('/', [IndexController::class, 'index'])->name('index');

// auth routes
Auth::routes(['verify' => true]);

// authenticated(verified) user(customer) routes
Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [User\UserDetailController::class, 'index'])->name('profile.index');
        Route::get('/{userDetail}/edit', [User\UserDetailController::class, 'edit'])->middleware('can:update,userDetail')->name('profile.edit'); // passsing id of user_detail as parameter
        Route::put('/{userDetail}', [User\UserDetailController::class, 'update'])->middleware('can:update,userDetail')->name('profile.update');
        Route::put('/{userDetail}/image', [User\UserDetailController::class, 'updateImage'])->middleware('can:update,userDetail')->name('profile.updateImage');
        Route::delete('/{userDetail}/image', [User\UserDetailController::class, 'removeImage'])->middleware('can:update,userDetail')->name('profile.removeImage');
        Route::resource('/address', User\AddressController::class);
    });
});
// route to fetch cities 
Route::put('/getCities/{country_id}', [User\AddressController::class, 'getCities'])->middleware(['auth', 'verified']);


