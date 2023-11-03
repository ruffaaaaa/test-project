<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetails;
use App\Models\NoEquipments;
use App\Models\SelectedFacilities;
use App\Models\SupportPersonnel;
use App\Models\ReservationAttachments;
use App\Models\Reservee;

class ReservationDetailsController extends Controller
{
    public function store(Request $request)
    {
        $eventname = $request->input('nameofevent');
        $eventstartdate = $request->input('event-start-date');
        $eventenddate = $request->input('event-end-date');
        $eventstarttime = $request->input('event-start-time');
        $eventendtime = $request->input('event-end-time');
        $maxattendees = $request->input('max-attendees');
        $preparationstartdate = $request->input('preparation-start-date');
        $preparationenddate = $request->input('preparation-end-date');
        $preparationstarttime = $request->input('preparation-start-time');
        $preparationendtime = $request->input('preparation-end-time');
        $cleanupstartdate = $request->input('cleanup-start-date');
        $cleanupenddate = $request->input('cleanup-end-date');
        $cleanupstarttime = $request->input('cleanup-start-time');
        $cleanupendtime = $request->input('cleanup-end-time');
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
            'event_start_time' => $eventstarttime,
            'event_end_time' => $eventendtime,
            'max_attendees' => $maxattendees,
            'preparation_start_date' => $preparationstartdate,
            'preparation_end_date' => $preparationenddate,
            'preparation_start_time' => $preparationstarttime,
            'preparation_end_time' => $preparationendtime,
            'cleanup_start_date' => $cleanupstartdate,
            'cleanup_end_date' => $cleanupenddate,
            'cleanup_start_time' => $cleanupstarttime,
            'cleanup_end_time' => $cleanupendtime,
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
        ]);
        

        return response()->json(['success' => true, 'reservationCode' => $reserveeID]);
    }
}
