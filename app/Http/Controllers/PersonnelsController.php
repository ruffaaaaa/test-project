<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;

class PersonnelsController extends Controller
{
    public function create(Request $request)
    {
        $personnels = new Personnels();

        $personnels->personnelName = $request->input('personnelName');

        $personnels->save();

        return redirect('/personnels');
    }
}
