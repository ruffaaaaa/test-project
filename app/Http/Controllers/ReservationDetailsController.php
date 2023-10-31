<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetails;

class ReservationDetailsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data as needed

        $facilityIds = $request->input('facilityID');
        $eventname = $request->input('nameofevent');

        // Find the last reservation code and extract the numeric part
        $lastReservation = ReservationDetails::latest('reservedetailsID')->first();
        $lastNumericPart = 10000;

        if ($lastReservation) {
            $lastReservationCode = $lastReservation->reservedetailsID;
            $lastNumericPart = (int) $lastReservationCode;
        }

        // Increment the numeric part
        $nextNumericPart = $lastNumericPart + 1;

        // Save the reservation details to the database
        foreach ($facilityIds as $facilityId) {
            ReservationDetails::create([
                'reservedetailsID' => $nextNumericPart,
                'facilityID' => $facilityId,
                'event_name' => $eventname,
            ]);
            $nextNumericPart++; // Increment for the next reservation
        }

        // Redirect or display a success message to the user
        return response()->json(['success' => true, 'reservationCode' => $nextNumericPart]);
    }
}
