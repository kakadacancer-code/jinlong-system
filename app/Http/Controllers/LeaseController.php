<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    // GET /leases - get all leases
    public function index()
    {
        $leases = Lease::with(['tenant', 'unit'])->get();
        return response()->json($leases);
    }

    // POST /leases - create new lease
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id'  => 'required|exists:tenants,id',
            'unit_id'    => 'required|exists:units,id',
            'start_date' => 'required|date',
            'status'     => 'sometimes|string',
        ]);

        $lease = Lease::create($request->all());
        return response()->json($lease, 201);
    }

    // GET /leases/{id} - get single lease
    public function show(string $id)
    {
        $lease = Lease::with(['tenant', 'unit', 'payments'])->find($id);

        if (!$lease) {
            return response()->json(['message' => 'Lease not found'], 404);
        }

        return response()->json($lease);
    }

    // PUT /leases/{id} - update lease
    public function update(Request $request, string $id)
    {
        $lease = Lease::find($id);

        if (!$lease) {
            return response()->json(['message' => 'Lease not found'], 404);
        }

        $request->validate([
            'tenant_id'  => 'sometimes|exists:tenants,id',
            'unit_id'    => 'sometimes|exists:units,id',
            'start_date' => 'sometimes|date',
            'status'     => 'sometimes|string',
        ]);

        $lease->update($request->all());
        return response()->json($lease);
    }

    // DELETE /leases/{id} - delete lease
    public function destroy(string $id)
    {
        $lease = Lease::find($id);

        if (!$lease) {
            return response()->json(['message' => 'Lease not found'], 404);
        }

        $lease->delete();
        return response()->json(['message' => 'Lease deleted successfully']);
    }
}