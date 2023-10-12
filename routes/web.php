<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Models\Facilities;

// AdminAUTH
Route::middleware(['auth', 'no-cache'])->group(function () {
    Route::get('/index1', [AdminAuthController::class, 'index1'])->name('index1');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});
Route::get('/login', [AdminAuthController::class, 'DisplayLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);
Route::get('/index2', [AdminAuthController::class, 'index2'])->name('index2');
Route::match(['get', 'post'], '/insert-admin-user', [AdminAuthController::class, 'insertAdmin']);


// Facilities
Route::middleware(['auth'])->group(function () {
    Route::get('/facilities', function () {
        $facilities = Facilities::all();
        return view('dashboard.admin.facilities', compact('facilities'));
    })->name('facilities');
    Route::post('/create', [FacilitiesController::class, 'create'])->name('save');
});
Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');



// Home
Route::get('/', [HomeController::class, 'CarouselFacilities']);

// Navigate
Route::get('/create', [NavigateController::class, 'showCreatePage'])->name('facility-create');
Route::get('/reservation', [NavigateController::class, 'showReservationPage'])->name('reservation');


//Reservation
Route::get('/reservation', [ReservationController::class, 'displayFacilities']);
