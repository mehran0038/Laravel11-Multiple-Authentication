<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {
  
    Route::get('/welocme', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
});
// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');
});