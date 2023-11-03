<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use App\Models\SupportPersonnel;
use App\Models\Personnels;
use App\Models\Equipments;
use Illuminate\Support\Facades\Auth;


class NavigateController extends Controller
{
    public function showFacilities()
    {   
    
        if (Auth::check()) {
        return view('dashboard.admin.facilities');
        }
        return redirect()->route('login');
    }

    public function showEquipments()
    {   
    
        if (Auth::check()) {
        return view('dashboard.admin.equipments');
        }
        return redirect()->route('login');
    }

    public function showPersonnels()
    {   
    
        if (Auth::check()) {
        return view('dashboard.admin.personnels');
        }
        return redirect()->route('login');
    }

    public function showCreatePage()
    {
        return view('dashboard.admin.facilities-crud.create'); 
    }

    public function showCreatePersonnel()
    {
        return view('dashboard.admin.personnel-crud.create'); 
    }

    public function showCreateEquipment()
    {
        return view('dashboard.admin.equipments-crud.create'); 
    }



    public function CarouselFacilities()
    {
           $facilities = Facility::all(); 

         return view('resources.welcome', compact('facilities'));

    }

    public function showReservationPage(){

        return view('reservation');
    }

    public function showAdminCalendarPage(){

        return view('dashboard.admin.calendar');
    }

    public function showReservationForm()
    {
        $supportPersonnels = SupportPersonnel::all();
        $personnels = Personnels::all();

        $facilities = Facilities::all();
        $equipments = Equipments::all();

        return view('reservation', compact('supportPersonnels', 'facilities','personnels','equipments'));
    }

}
