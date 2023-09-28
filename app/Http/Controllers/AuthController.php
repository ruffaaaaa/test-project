<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
    {
        // Display the login form
        public function showLoginForm()
        {
            return view('auth.login'); 
        }
        
        public function login(Request $request)
        {
            $request->validate([
                'email' => ['required', 'string', 'email:filter'],
                'password' => ['required', 'string'],
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user(); 

                switch ($user->role_id) {
                    case 1:
                        return redirect()->route('index1'); // Redirect to index1 for role_id 1
                        break;
                    case 2:
                        return redirect()->route('index2'); // Redirect to index2 for role_id 2
                        break;
                    default:
                    return view('dashboard.default'); // Default view for other roles
                }
            }

            // Authentication failed
            return back()->withErrors(['email' => 'Invalid login credentials']);
        }

        public function index1()
        {
            return view('dashboard.admin.index');
        }
        public function index2()
        {
            // Logic for handling index2 goes here
            return view('dashboard.user.index'); // Replace with your desired view
        }


}
