<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Facilities;
use Illuminate\Support\Facades\Auth;


class FacilitiesController extends Controller
{

    // CRUD FACILITES
    public function create(Request $request)
    {

        $facilities = new Facilities();

        $facilities-> facilityName = $request -> input('facilityName');
        $facilities-> image = $request -> input('image');
        $facilities-> status = $request -> input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/facilities/', $filename);
            $facilities->image = $filename;
        }

        $facilities->save();

        return redirect('/facilities');

    }

    public function update(Request $request, $facilityID)
    {
        $request->validate([
            'facilityName' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $facility = Facilities::findOrFail($facilityID);
        $facility->facilityName = $request->input('facilityName');
        $facility->status = $request->input('status');
        $facility->save();

        return redirect()->route('facilities')->with('success', 'Facility updated successfully');
    }

    public function destroy($facilityID)
    {
        $facility = Facilities::find($facilityID);
        
        if (!$facility) {
            return redirect()->route('facilities')->with('error', 'Facility not found');
        }
    
        $facility->delete();
    
        return redirect()->route('facilities')->with('success', 'Facility deleted successfully');
    }

}