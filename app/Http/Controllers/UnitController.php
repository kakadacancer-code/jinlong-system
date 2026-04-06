<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    // GET /units - get all units
    public function index()
    {
        $units = Unit::with('property')->get();
        return response()->json($units);
    }

    // POST /units - create new unit
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'unit_number' => 'required|string',
            'status'      => 'sometimes|string',
        ]);

        $unit = Unit::create($request->all());
        return response()->json($unit, 201);
    }

    // GET /units/{id} - get single unit
    public function show(string $id)
    {
        $unit = Unit::with(['property', 'leases'])->find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        return response()->json($unit);
    }

    // PUT /units/{id} - update unit
    public function update(Request $request, string $id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        $request->validate([
            'property_id' => 'sometimes|exists:properties,id',
            'unit_number' => 'sometimes|string',
            'status'      => 'sometimes|string',
        ]);

        $unit->update($request->all());
        return response()->json($unit);
    }

    // DELETE /units/{id} - delete unit
    public function destroy(string $id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        $unit->delete();
        return response()->json(['message' => 'Unit deleted successfully']);
    }
}