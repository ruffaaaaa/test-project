<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}