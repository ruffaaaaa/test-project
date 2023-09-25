<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert initial roles into the 'roles' table
        DB::table('roles')->insert([
            ['name' => 'Superadmin'],
            ['name' => 'College Department'],
            // Add more roles as needed
        ]);
    }
}

