<?php

namespace App\Http\Controllers;
use App\Models\Facilities;


use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function displayFacilities()
    {
        $facilities = Facilities::all();
        return view('reservation', compact('facilities'));
    }

}
