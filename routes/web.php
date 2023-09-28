<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Models\Facilities;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/index2', [AuthController::class, 'index2'])->name('index2');
Route::get('/facilities', [FacilitiesController::class, 'showFacilities'])->name('facilities');
Route::get('/create', [FacilitiesController::class, 'showCreateFacilities'])->name('facility-create');
Route::post('/create', [FacilitiesController::class, 'CreateFacilities'])->name('save');
Route::match(['get', 'post'], '/insert-admin-user', [AdminController::class, 'insertAdminUser']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [FacilitiesController::class, 'CarouselFacilities']);
Route::get('/', [FacilityController::class, 'FacilitiesNamee']);



// Route::get('/', function () {
//     return view('welcome');
// });

// Add the '/dashboard' route within the 'auth' middleware group
Route::middleware(['auth', 'no-cache'])->group(function () {
    Route::get('/index1', [AuthController::class, 'index1'])->name('index1');
});

Route::get('/', function () {

    // $facilityImages = Facilities::select('image')->get();
    // return view('welcome', compact('facilityImages'));

    // $facilities = Facilities::all(); 
    // return view('resource.welcome', compact('facilities'));

    $facilities = Facilities::all(); // Retrieve all facilities from the database

    return view('welcome', compact('facilities'));
});

