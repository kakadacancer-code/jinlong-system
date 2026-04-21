<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;

class RentsController extends Controller
{
  
    public function index()
    {
        $units      = Unit::with('property')->get();
        $properties = Property::all();
        return view('admin.rents', compact('units', 'properties'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'unit_number' => 'required|string',
            'status'      => 'required|string',
        ]);

        Unit::create($request->all());
        return redirect()->route('rents.index')->with('success', 'Unit created successfully!');
    }

    // Delete unit
    public function destroy(string $id)
    {
        $unit = Unit::find($id);
        if ($unit) {
            $unit->delete();
        }
        return redirect()->route('rents.index')->with('success', 'Unit deleted successfully!');
    }
}