<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ReservationDetails;
use App\Http\Controllers\CalendarController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/schedule', function () {
    $reservations = ReservationDetails::all();

    // Fetch events: Filter reservations where event_start_date is not null
    $events = $reservations->filter(function ($reservation) {
        return !is_null($reservation->event_start_date);
    })->all();

    // Fetch preparations: Filter reservations where preparation_start_date is not null
    $preparations = $reservations->filter(function ($reservation) {
        return !is_null($reservation->preparation_start_date);
    })->all();

    // Fetch cleanups: Filter reservations where cleanup_start_date_time is not null
    $cleanups = $reservations->filter(function ($reservation) {
        return !is_null($reservation->cleanup_start_date_time);
    })->all();

    return response()->json(['events' => $events, 'preparations' => $preparations, 'cleanups' => $cleanups]);
});


Route::get('/facility/{facilityID}',  [CalendarController::class, 'getFacilityName']);

