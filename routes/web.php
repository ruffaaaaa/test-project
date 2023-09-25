<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/index1', [AuthController::class, 'index1'])->name('index1');
Route::get('/index2', [AuthController::class, 'index2'])->name('index2');

Route::match(['get', 'post'], '/insert-admin-user', [AdminController::class, 'insertAdminUser']);

Route::get('/', function () {
    return view('welcome');
});



