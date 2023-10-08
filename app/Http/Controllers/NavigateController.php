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
        // If not authenticated, you may want to redirect to the login page or show an error message.
        // For example, redirect to the login page:
        return redirect()->route('login');
    }

    public function showCreatePage()
    {
        return view('dashboard.admin.facilities-crud.create'); 
    }

    public function CarouselFacilities()
    {
        // Retrieve facility images
           $facilities = Facility::all(); // Retrieve all facilities from the database

         return view('resources.welcome', compact('facilities'));

    }

}
