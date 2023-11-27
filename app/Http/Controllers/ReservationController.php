<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetails;
use App\Models\NoEquipments;
use App\Models\SelectedFacilities;
use App\Models\SupportPersonnel;
use App\Models\ReservationAttachments;
use App\Models\Reservee;
use App\Models\Personnels;
use App\Models\Facilities;
use App\Models\Equipments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ReservationController extends Controller
{
    public function showReservationForm()
    {
        $supportPersonnels = SupportPersonnel::all();
        $personnels = Personnels::all();

        $facilities = Facilities::all();
        $equipments = Equipments::all();

        return view('reservation', compact('supportPersonnels', 'facilities','personnels','equipments'));
    }

    public function store(Request $request)
    {
        $eventname = $request->input('nameofevent');
        $eventstartdate = $request->input('event-start-date');
        $eventenddate = $request->input('event-end-date');
        $maxattendees = $request->input('max-attendees');
        $preparationstartdate = $request->input('preparation-start-date');
        $preparationenddate = $request->input('preparation-end-date');
        $cleanupstartdate = $request->input('cleanup-start-date');
        $cleanupenddate = $request->input('cleanup-end-date');
        $facilityCheckboxes = $request->input('facility_checkbox');
        $equipmentCheckboxes = $request->input('equipment_checkbox');
        $equipmentDetails = $request->input('equipment_details');
        $personnelCheckboxes = $request-> input('personnel_checkbox');
        $personnelDetails = $request->input('personnel_details');
        $reserveeName = $request->input('reserveeName');
        $personIncharge =$request->input('person_in_charge_event');
        $contact_details =$request->input('contact_details');
        $unit = $request->input('unit_department_company');
        $dateoffiling = $request->input('date_of_filing');
        $endorsedby = $request->input('endorsed_by');
        $designation = $request->input('designation');


    
        $attachmentFilenames = [];

        if ($request->hasFile('attachments')) {
            $attachments = $request->file('attachments');

            foreach ($attachments as $attachment) {
                $originalFilename = $attachment->getClientOriginalName();
                $originalFilename = str_replace([' ', ','], ['_', ''], $originalFilename);
                $originalPath = '' . $originalFilename;
                $attachment->move(public_path('uploads/attachments'), $originalFilename);
                $attachmentFilenames[] = $originalPath;
            }
        }

        $attachmentFilenameString = implode(', ', $attachmentFilenames);
                
        $lastReservation = ReservationDetails::latest('reservedetailsID')->first();
        $lastNumericPart = 10000;

        if ($lastReservation) {
            $lastReservationCode = $lastReservation->reservedetailsID;
            $lastNumericPart = (int) $lastReservationCode;
        }

        $nextNumericPart = $lastNumericPart + 1;

        $reserveeID = 'LSUFRS' . time();

        $reservation = ReservationDetails::create([
            'reservedetailsID' => $nextNumericPart,
            'event_name' => $eventname,
            'event_start_date' => $eventstartdate,
            'event_end_date' => $eventenddate,
            'max_attendees' => $maxattendees,
            'preparation_start_date' => $preparationstartdate,
            'preparation_end_date_time' => $preparationenddate,
            'cleanup_start_date_time' => $cleanupstartdate,
            'cleanup_end_date_time' => $cleanupenddate,
        ]);

        foreach ($facilityCheckboxes as $facilityId => $checked) {
          
            SelectedFacilities::create([
                'reservedetailsID' => $nextNumericPart,
                'facilityID' => $facilityId,
            ]);
            
        }

        foreach ($equipmentCheckboxes as $equipmentId => $checked) {
            if ($checked) {
                $equipmentNoRequired = $equipmentDetails[$equipmentId];
                NoEquipments::create([
                    'equipmentID' => $equipmentId,
                    'total_no' => $equipmentNoRequired,
                    'reservedetailsID' => $nextNumericPart,
                ]);
            }
        }

        foreach ($personnelCheckboxes as $personnelId => $checked) {
            if ($checked) {
                $personnelNoRequired = $personnelDetails[$personnelId]; 
                SupportPersonnel::create([
                    'personnelID' => $personnelId,
                    'total_no' => $personnelNoRequired,
                    'reservedetailsID' => $nextNumericPart,
                ]);
            }
        }
        
      
        ReservationAttachments::create([
            'reservedetailsID' => $nextNumericPart,
            'file' => $attachmentFilenameString,
        ]);

        Reservee::create([
            'reserveeID' => $reserveeID,
            'reserveeName' => $reserveeName,
            'reservedetailsID' => $nextNumericPart,
            'person_in_charge_event' => $personIncharge,
            'contact_details' => $contact_details,
            'unit_department_company' => $unit,
            'date_of_filing' => $dateoffiling,
            'endorsed_by' => $endorsedby,
            'status' => 'Pending', 
        ]);
        

        return response()->json(['success' => true, 'reservationCode' => $reserveeID]);
    }

    public function showModalReservationDetails()
    {
        if (Auth::check()) {
            $reservationDetails = DB::table('reservee')
                ->join('reservation_details', 'reservee.reservedetailsID', '=', 'reservation_details.reservedetailsID')
                ->join('selected_facilities', 'selected_facilities.reservedetailsID', '=', 'reservation_details.reservedetailsID')
                ->join('facilities', 'facilities.facilityID', '=', 'selected_facilities.facilityID')
                ->select('reservee.*', 'reservation_details.*', 'selected_facilities.*', 'facilities.*')
                ->distinct('reservee.reserveeID') // Use DISTINCT to get unique reserveeID

                ->get();
    
            return view('dashboard.admin.adminreservation', compact('reservationDetails'));
        }
    
        return redirect()->route('login');
    }

    public function showModalReservationDetailsLLA()
    {
        if (Auth::check()) {
            $reservationDetails = DB::table('reservee')
                ->join('reservation_details', 'reservee.reservedetailsID', '=', 'reservation_details.reservedetailsID')
                ->join('selected_facilities', 'selected_facilities.reservedetailsID', '=', 'reservation_details.reservedetailsID')
                ->join('facilities', 'facilities.facilityID', '=', 'selected_facilities.facilityID')
                ->select('reservee.*', 'reservation_details.*', 'selected_facilities.*', 'facilities.*')
                ->distinct('reservee.reserveeID') // Use DISTINCT to get unique reserveeID

                ->get();
    
            return view('dashboard.user.adminreservation', compact('reservationDetails'));
        }
    
        return redirect()->route('login');
    }

    public function notifsLLA($year, $month, $selectedFacilityID = null)
    {
        $eventsQuery = ReservationDetails::select(
            'reservation_details.event_name',
            'reservation_details.event_start_date',
        )
        ->join('reservee', 'reservation_details.reservedetailsID', '=', 'reservee.reservedetailsID')
        ->join('selected_facilities', 'reservation_details.reservedetailsID', '=', 'selected_facilities.reservedetailsID')
        ->join('facilities', 'selected_facilities.facilityID', '=', 'facilities.facilityID') // Join facilities table
        ->whereYear('reservation_details.event_start_date', $year)
        ->whereMonth('reservation_details.event_start_date', $month);

        if ($selectedFacilityID !== null) {
            $eventsQuery->where('selected_facilities.facilityID', $selectedFacilityID);
        }

        $events = $eventsQuery->get();

        return response()->json($events);
    }
}


