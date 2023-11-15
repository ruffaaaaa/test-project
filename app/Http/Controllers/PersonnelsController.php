<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;

class PersonnelsController extends Controller
{
    public function showCreatePersonnel()
    {
        return view('dashboard.admin.personnel-crud.create'); 
    }
    
    public function create(Request $request)
    {
        $personnels = new Personnels();

        $personnels->personnelName = $request->input('personnelName');

        $personnels->save();

        return redirect('/personnels');
    }

    public function destroy($personnelID)
    {
        $personnels = Personnels::find($personnelID);
        
        if (!$personnels) {
            return redirect()->route('personnels')->with('error', 'Personnel not found');
        }
    
        $personnels->delete();
    
        return redirect()->route('personnels')->with('success', 'Personnel deleted successfully');
    }

}