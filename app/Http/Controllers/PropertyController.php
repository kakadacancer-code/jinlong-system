<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('units')->get();
        return response()->json($properties);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'location' => 'required|string',
        ]);

        $property = Property::create($request->all());
        return response()->json($property, 201);
    }

    public function show(string $id)
    {
        $property = Property::with('units')->find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        return response()->json($property);
    }

    public function update(Request $request, string $id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $request->validate([
            'name'     => 'sometimes|string',
            'location' => 'sometimes|string',
        ]);

        $property->update($request->all());
        return response()->json($property);
    }

    public function destroy(string $id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }
}