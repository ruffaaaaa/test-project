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
                'email' => ['required', 'string', 'email:filter'], // Allow numeric email addresses
                'password' => ['required', 'string'],
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication was successful
                $user = Auth::user(); // Get the authenticated user

                // Check the user's role_id
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
            return view('dashboard.index1');
        }
        public function index2()
        {
            // Logic for handling index2 goes here
            return view('dashboard.index2'); // Replace with your desired view
        }


}
