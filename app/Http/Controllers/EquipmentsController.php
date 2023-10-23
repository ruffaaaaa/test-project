<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;


class EquipmentsController extends Controller
{
    public function create(Request $request)
    {
        $equipments = new Equipments();

        $equipments->equipmentName = $request->input('equipmentName');

        $equipments->save();

        return redirect('/equipments');
    }
}
