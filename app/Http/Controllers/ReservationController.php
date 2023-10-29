<?php

namespace App\Http\Controllers;
use App\Models\Facilities;
use App\Models\SupportPersonnel;
use App\Models\Personnels;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservationForm()
    {
        // Retrieve the list of support personnel
        $supportPersonnels = SupportPersonnel::all();
        $personnels = Personnels::all();

        // Retrieve the list of facilities if needed
        $facilities = Facilities::all();

        return view('reservation', compact('supportPersonnels', 'facilities','personnels'));
    }





}
