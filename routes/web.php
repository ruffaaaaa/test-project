<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\ReservationDetailsController;
use App\Models\Facilities;
use App\Models\Personnels;
use App\Models\Equipments;
use App\Models\SupportPersonnel;

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
    Route::post('/facilitycreate', [FacilitiesController::class, 'create'])->name('facility_save');
    Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
});



// Home
Route::get('/', [HomeController::class, 'CarouselFacilities']);

// Navigate
Route::get('/facilitycreate', [NavigateController::class, 'showCreatePage'])->name('facility-create');
Route::get('/reservation', [NavigateController::class, 'showReservationPage'])->name('reservation');
Route::get('/personnels', [NavigateController::class, 'showPersonnels'])->name('personnels');
Route::get('/equipments', [NavigateController::class, 'showEquipments'])->name('equipments');;
Route::get('/percreate', [NavigateController::class, 'showCreatePersonnel'])->name('personnel-create');
Route::get('/equipcreate', [NavigateController::class, 'showCreateEquipment'])->name('equipment-create');
Route::get('/reservation-submit', [NavigateController::class, 'showReservationModal'])->name('reservation-submit');
Route::get('/calendar', [NavigateController::class, 'showAdminCalendarPage'])->name('calendar');


//Reservation
Route::get('/reservation', [ReservationController::class, 'displayFacilities']);


// Facilities
Route::middleware(['auth'])->group(function () {
    Route::get('/personnels', function () {
        $personnels = Personnels::all();
        return view('dashboard.admin.personnels', compact('personnels'));
    })->name('personnels');
    Route::post('/percreate', [PersonnelsController::class, 'create'])->name('personnel_save');
    // Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    // Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
});

// Equipments
Route::middleware(['auth'])->group(function () {
    Route::get('/equipments', function () {
        $equipments = Equipments::all();
        return view('dashboard.admin.equipments', compact('equipments'));
    })->name('equipments');
    Route::post('/equipcreate', [EquipmentsController::class, 'create'])->name('equipment_save');
    // Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    // Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
});


Route::get('/reservation', [ReservationController::class, 'showReservationForm'])->name('reservation.form');

// ReservationDetailsController

Route::post('/reservation/store', [ReservationDetailsController::class, 'store'])->name('reservation.store');
