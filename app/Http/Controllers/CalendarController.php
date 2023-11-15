<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetails;
use App\Models\Reservee;
use App\Models\Facilities;
use App\Models\SelectedFacilities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
   
    public function getEvents($year, $month, $selectedFacilityID = null)
    {
        $eventsQuery = ReservationDetails::select(
            'reservation_details.event_name',
            'reservation_details.event_start_date',
            'reservation_details.event_end_date',
            // 'reservation_details.event_end_time',
            'reservation_details.preparation_start_date',
            'reservation_details.preparation_end_date_time',
            'reservation_details.cleanup_start_date_time',
            'reservation_details.cleanup_end_date_time',
            'reservee.status',
            'selected_facilities.facilityID'
        )
        ->join('reservee', 'reservation_details.reservedetailsID', '=', 'reservee.reservedetailsID')
        ->join('selected_facilities', 'reservation_details.reservedetailsID', '=', 'selected_facilities.reservedetailsID')
        ->whereYear('reservation_details.event_start_date', $year)
        ->whereMonth('reservation_details.event_start_date', $month);

        if ($selectedFacilityID !== null) {
            $eventsQuery->where('selected_facilities.facilityID', $selectedFacilityID);
        }

        $events = $eventsQuery->get();

        return response()->json($events);
    }

    
    public function facilitiesFilter()
    {
        $facilities = Facilities::all();

        return view('dashboard.admin.calendar', ['facilities' => $facilities]);
    }


    
}
