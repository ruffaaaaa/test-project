<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    public function showSettings(){
        if (Auth::check()) {
        return view('dashboard.admin.settings');
        }
        return redirect()->route('login');
    }
}
