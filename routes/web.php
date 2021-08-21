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
});
