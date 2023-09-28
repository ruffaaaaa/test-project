<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Facilities;


class FacilitiesController extends Controller
{
    // Display the login form
    public function showFacilities()
    {
        return view('dashboard.admin.facilities'); // Assuming your login form is in resources/views/auth/login.blade.php
    }

    public function showCreateFacilities()
    {
        return view('dashboard.admin.facilities-crud.create'); // Assuming your login form is in resources/views/auth/login.blade.php
    }

    public function CreateFacilities(Request $request)
    {
        $facilities = new Facilities();

        $facilities-> facilityName = $request -> input('facilityName');
        $facilities-> image = $request -> input('image');
        $facilities-> status = $request -> input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/facilities/', $filename);
            $facilities->image = $filename;
        }

        $facilities->save();

        return view('dashboard.admin.facilities-crud.create')->with('facilities', $facilities);

    }

    public function CarouselFacilities()
    {
        // Retrieve facility images
           $facilities = Facility::all(); // Retrieve all facilities from the database

         return view('resources.welcome', compact('facilities'));

    }

 
}