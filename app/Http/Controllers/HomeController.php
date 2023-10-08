<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function CarouselFacilities()
    {
           $facilities = Facilities::all(); 
         return view('index', compact('facilities'));

    }
}
