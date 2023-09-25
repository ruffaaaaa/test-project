<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the AdminUser model

class AdminController extends Controller
{
    public function insertAdminUser(Request $request)
    {
        $adminUser = new User();
        $adminUser->username = 'Jam';
        $adminUser->email = 'jam@example.com';
        $adminUser->password = bcrypt('1234');
        $adminUser->role_id= 2;
        $adminUser->save();

        return 'Admin user created successfully';
    }
}
