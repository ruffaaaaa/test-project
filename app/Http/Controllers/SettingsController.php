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
        $user = User::findOrFail(auth()->user()->id);
        $user->aname = $request->input('aname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id); 
        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function saprofile(Request $request)
    {
        $user = Auth::User();

        return view('dashboard.admin.profile', ['user' => $user]);
    }

    public function adminmanagement(Request $request)
    {
        $usersWithRoles = User::with('role')->get();

        return view('dashboard.admin.adminmanagement', ['usersWithRoles' => $usersWithRoles]);

    }

    public function create(Request $request)
    {
        $user = new User();

        $user->aname = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->active = 1;
        $user->role_id = $request->input('role');

        
        $user->save();

        return redirect()->route('admin.management')->with('success', 'Facility added successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('admin.management')->with('error', 'Facility not found');
        }
    
        $user->delete();
    
        return redirect()->route('admin.management')->with('success', 'Facility deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->input('role');
        $user->save();

        return redirect()->route('admin.management')->with('success', 'Facility updated successfully');

    }

}
