<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = Auth::user(); // Get the authenticated user

        // Check the user's role_id
        switch ($user->role_id) {
            case 1:
                return view('dashboard.index1'); // Return the 'dashboard.index1' view
            case 2:
                return view('dashboard.index2'); // Return the 'dashboard.index2' view
            default:
                return view('dashboard.default'); // Default view for other roles
        }
        
    }
}
