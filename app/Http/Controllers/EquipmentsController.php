<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;


class EquipmentsController extends Controller
{
    public function showCreateEquipment()
    {
        return view('dashboard.admin.equipments-crud.create'); 
    }


    public function create(Request $request)
    {
        $equipments = new Equipments();

        $equipments->equipmentName = $request->input('equipmentName');

        $equipments->save();

        return redirect()->route('equipments')->with('success', 'Equipment deleted successfully');
    }

    public function destroy($equipmentID)
    {
        $equipments = Equipments::find($equipmentID);
        
        if (!$equipments) {
            return redirect()->route('equipments')->with('error', 'Equipment not found');
        }
    
        $equipments->delete();
    
        return redirect()->route('equipments')->with('success', 'Equipment deleted successfully');
    }
}
