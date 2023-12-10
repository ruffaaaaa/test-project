<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class SettingsController extends Controller
{
    public function showSettings(){
        if (Auth::check()) {
        return view('dashboard.admin.settings');
        }
        return redirect()->route('login');
    }
    public function showProfileforLLA(){
        if (Auth::check()) {
        return view('dashboard.user.profile');
        }
        return redirect()->route('login');
    }

    public function profile(Request $request)
    {
        $user = Auth::User();

        return view('dashboard.user.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id); // Assuming you're using authentication
        $user->aname = $request->input('aname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->save();

        // Redirect back or to a specific route after updating
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id); // Assuming you're using authentication
        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function saprofile(Request $request)
    {
        $user = Auth::User();

        return view('dashboard.admin.profile', ['user' => $user]);
    }
}
