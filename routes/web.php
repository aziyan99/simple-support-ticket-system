<?php

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

Route::get('/', function () {
    return response()->json(['msg' => 'Hello World!!']);
});

Auth::routes([
    'reset' => false,
    'verify' => false
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/category', \App\Http\Controllers\CategoryController::class)->except(['show']);
    Route::resource('/ticket', \App\Http\Controllers\TicketController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])
        ->name('profile.index');
    Route::put('/profile/update/{id}', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update.data');
    Route::put('/profile/password/{id}', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])
        ->name('profile.update.password');
});
