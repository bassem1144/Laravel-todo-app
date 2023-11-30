<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

// Login Routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('showLogin');

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Routes
Route::get('register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/task/create', [DashboardController::class, 'create'])->name('task.create')->middleware('auth');

Route::post('/task/store', [DashboardController::class, 'store'])->name('task.store')->middleware('auth');

Route::get('/task/edit/{id}', [DashboardController::class, 'edit'])->name('task.edit')->middleware('auth');

Route::put('/task/update/{id}', [DashboardController::class, 'update'])->name('task.update')->middleware('auth');

Route::delete('/task/delete/{id}', [DashboardController::class, 'delete'])->name('task.delete')->middleware('auth');