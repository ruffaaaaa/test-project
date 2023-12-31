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
    Route::get('/', [AdminAuthController::class, 'index2'])->name('index1');
    Route::get('/admin-dashboard', [AdminAuthController::class, 'HelloAdmin'])->name('index1');
    Route::get('/admin-dashboard-reservation', [ReservationController::class, 'showAllReservations']);

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/lla-dashboard', [AdminAuthController::class, 'welcomeAdmin'])->name('index2');
    Route::get('/lla-profile', [SettingsController::class, 'profile']);
    Route::get('/admin-profile', [SettingsController::class, 'saprofile']);
    Route::get('/admin-management', [SettingsController::class, 'adminmanagement'])->name('admin.management');
    Route::post('/management/save', [SettingsController::class, 'create'])->name('admin.save');
    Route::delete('/management/{id}', [SettingsController::class, 'destroy'])->name('admin.destroy');
    Route::put('/admin-management/{id}', [SettingsController::class, 'update'])->name('update.management');
});



    Route::put('/lla-profile/update', [SettingsController::class, 'updateProfile'])->name('llaprofile.update');
    Route::put('/lla-profile/updatePassword', [SettingsController::class, 'updatePassword'])->name('llaprofile.password');
Route::get('/login', [AdminAuthController::class, 'DisplayLoginForm'])->name('login');

Route::post('/login', [AdminAuthController::class, 'login']);


Route::match(['get', 'post'], '/insert-admin-user', [AdminAuthController::class, 'insertAdmin']);



// Facilities
Route::middleware(['auth'])->group(function () {
    Route::get('/admin-facilities', function () {
        $facilities = Facilities::all();
        return view('dashboard.admin.facilities', compact('facilities'));
    })->name('admin.facilities');
    Route::post('/facilities/save', [FacilitiesController::class, 'create'])->name('facility.save');
    Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::delete('/facilities/{facilityID}', [FacilitiesController::class, 'destroy'])->name('facilities.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/lla-facilities', function () {
        $facilities = Facilities::all();
        return view('dashboard.user.facilities', compact('facilities'));
    })->name('lla.facilities');
    Route::post('/llafacilities/save', [FacilitiesController::class, 'llacreate'])->name('llafacility.save');
    Route::put('/facilities/{facilityID}', [FacilitiesController::class, 'llaupdate'])->name('llafacilities.update');
    Route::delete('/llafacilities/{facilityID}', [FacilitiesController::class, 'lladestroy'])->name('llafacilities.destroy');
    Route::get('/facilitycreate', [FacilitiesController::class, 'showCreateFacilities'])->name('llafacility-create');

});
Route::get('/', [FacilitiesController::class, 'CarouselFacilities']);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin-personnels', function () {
        $personnels = Personnels::all();
        return view('dashboard.admin.personnels', compact('personnels'));
    })->name('personnels');
    Route::post('/personnels/save', [PersonnelsController::class, 'create'])->name('personnel_save');
    Route::delete('/personnels/{personnelID}', [PersonnelsController::class, 'destroy'])->name('personnels.destroy');

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
Route::get('/get-status/{reserveeID}', [ReservationController::class, 'getStatusFromDatabase']);


// ReservationDetailsController
Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin-settings', [SettingsController::class,'showSettings']);
});

Route::get('/events/{year}/{month}/{selectedFacilityID?}', [CalendarController::class, 'getEvents']);
// Route::get('/llaevents/{year}/{month}/{selectedFacilityID?}', [CalendarController::class, 'getEventsforHome']);

    Route::get('/admin-calendar',[CalendarController::class,'facilitiesFilter']);
    Route::get('/lla-calendar',[CalendarController::class,'LLAfacilitiesFilter']);
    Route::delete('/admin-reservation/{reservedetailsID}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    
Route::middleware(['auth'])->group(function () {
    Route::get('/reservee', [ReservationController::class, 'displayReservee']);
    Route::get('/admin-reservation', [ReservationController::class, 'showModalReservationDetails'])->name('admin-reservation');
    
    Route::put('/admin-reservation/{reserveeID}', [ReservationController::class, 'update'])->name('update.reservee');


});

Route::get('/lla-reservation', [ReservationController::class, 'showModalReservationDetailsLLA'])->name('lla-reservation');;

Route::get('/reservation', [ReservationController::class, 'showReservationForm'])->name('reservation');
Route::delete('/lla-reservation/{reservedetailsID}', [ReservationController::class, 'lladestroy'])->name('llareservation.destroy');



Route::get('/notifsLLA/{year}/{month}/{selectedFacilityID?}', [ReservationController::class, 'notifsLLA']);


Route::get('/memory-usage', function () {
    $memoryUsage = round(memory_get_peak_usage(true) / 1024 / 1024, 2); // Peak memory usage in MB

    return view('memory-usage', ['memoryUsage' => $memoryUsage]);
});

Route::get('/hard-drive', function () {
    $directory = storage_path('app/public'); // Replace with your directory path

    $size = 0;
    $files = File::allFiles($directory);

    foreach ($files as $file) {
        $size += $file->getSize();
    }

    $usedSpaceInMB = round($size / 1024 / 1024, 2); // Convert to MB

    return view('disk-space', [
        'usedSpace' => $usedSpaceInMB,
    ]);
});



