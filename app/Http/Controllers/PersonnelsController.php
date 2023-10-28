<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;

class PersonnelsController extends Controller
{
    public function create(Request $request)
    {
        $personnels = new Personnels();

        $personnels->personnelName = $request->input('personnelName');

        $personnels->save();

        return redirect('/personnels');
    }
    // NoSupportPersonnel.php

public function supportPersonnel()
{
    return $this->belongsTo(SupportPersonnel::class, 'personnelID');
}

// In your controller method that handles the form submission
public function store(Request $request)
{
    // Validate the form data here

    // Create a new reservation or use your existing code
    $reservation = new Reservation;

    // Save reservation details and get the reservation ID
    $reservation->save();

    // Loop through the selected support personnel and save to no_support_personnel table
    foreach ($request->input('support_personnel') as $personnelID) {
        $noSupportPersonnel = new NoSupportPersonnel;
        $noSupportPersonnel->personnelID = $personnelID;
        $noSupportPersonnel->total_no = $request->input('support_personnel_details.' . $personnelID);
        $noSupportPersonnel->reservedetailsID = $reservation->id;
        $noSupportPersonnel->save();
    }

    // Continue with the rest of the reservation submission logic

    // Redirect or return a response as needed
}

}
