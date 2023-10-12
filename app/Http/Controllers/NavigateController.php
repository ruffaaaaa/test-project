<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
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

    public function showCreatePage()
    {
        return view('dashboard.admin.facilities-crud.create'); 
    }

    public function CarouselFacilities()
    {
           $facilities = Facility::all(); 

         return view('resources.welcome', compact('facilities'));

    }

    public function showReservationPage(){

        return view('reservation');
    }

}
