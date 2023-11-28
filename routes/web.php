<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SettingsController;
use App\Models\Facilities;
use App\Models\Personnels;
use App\Models\Equipments;
use App\Models\SupportPersonnel;

// AdminAUTH
Route::middleware(['auth', 'no-cache'])->group(function () {
    Route::get('/admin-dashboard', [AdminAuthController::class, 'index1'])->name('index1');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/lla-dashboard', [AdminAuthController::class, 'welcomeAdmin'])->name('index2');
});
Route::get('/login', [AdminAuthController::class, 'DisplayLoginForm'])->name('login');

Route::post('/login', [AdminAuthController::class, 'login']);


Route::match(['get', 'post'], '/insert-admin-user', [AdminAuthController::class, 'insertAdmin']);



// Facilities
Route::middleware(['auth'])->group(function () {
    Route::get('/admin-facilities', function () {
        $facilities = Facilities::all();
        return view('dashboard.admin.facilities', compact('facilities'));
    })->name('facilities');
    Route::post('/facilitycreate', [FacilitiesController::class, 'create'])->name('facility_save');
    Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
    Route::get('/facilitycreate', [FacilitiesController::class, 'showCreateFacilities'])->name('facility-create');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/lla-facilities', function () {
        $facilities = Facilities::all();
        return view('dashboard.user.facilities', compact('facilities'));
    })->name('facilities');
    Route::post('/facilitycreate', [FacilitiesController::class, 'create'])->name('facility_save');
    Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
    Route::get('/facilitycreate', [FacilitiesController::class, 'showCreateFacilities'])->name('facility-create');

});
Route::get('/', [FacilitiesController::class, 'CarouselFacilities']);





Route::middleware(['auth'])->group(function () {
    Route::get('/admin-personnels', function () {
        $personnels = Personnels::all();
        return view('dashboard.admin.personnels', compact('personnels'));
    })->name('personnels');
    Route::post('/percreate', [PersonnelsController::class, 'create'])->name('personnel_save');
    Route::delete('/personnels/{personnelID}', [PersonnelsController::class, 'destroy'])->name('personnels.destroy');
    Route::get('/percreate', [PersonnelsController::class, 'showCreatePersonnel'])->name('personnel-create');

});

// Equipments
Route::middleware(['auth'])->group(function () {
    Route::get('/admin-equipments', function () {
        $equipments = Equipments::all();
        return view('dashboard.admin.equipments', compact('equipments'));
    })->name('equipments');
    Route::post('/equipcreate', [EquipmentsController::class, 'create'])->name('equipment_save');
    Route::delete('/equipments/{equipmentID}', [EquipmentsController::class, 'destroy'])->name('equipments.destroy');
    Route::get('/equipcreate', [EquipmentsController::class, 'showCreateEquipment'])->name('equipment-create');

});


Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');

// ReservationDetailsController
Route::middleware(['auth'])->group(function () {
    Route::get('/events/{year}/{month}/{selectedFacilityID?}', [CalendarController::class, 'getEvents'])->name('calendar');
    Route::get('/lla-calendar',[CalendarController::class,'facilitiesFilter']);
    Route::get('/events/{year}/{month}/{selectedFacilityID?}', [CalendarController::class, 'getEventsforLLA']);
    Route::get('/lla-calendar',[CalendarController::class,'facilitiesFilterforLLA']);
    Route::get('/admin-settings', [SettingsController::class,'showSettings']);
    Route::get('/lla-settings', [SettingsController::class,'showSettingsforLLA']);


});


Route::middleware(['auth'])->group(function () {
    Route::get('/reservee', [ReservationController::class, 'displayReservee']);
    Route::get('/admin-reservation', [ReservationController::class, 'showModalReservationDetails'])->name('admin-reservation');

});

Route::get('/lla-reservation', [ReservationController::class, 'showModalReservationDetailsLLA'])->name('lla-reservation');;

Route::get('/reservation', [ReservationController::class, 'showReservationForm'])->name('reservation');

Route::get('/notifsLLA/{year}/{month}/{selectedFacilityID?}', [ReservationController::class, 'notifsLLA']);

