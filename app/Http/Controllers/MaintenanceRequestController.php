<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    // GET /maintenance-requests - get all requests
    public function index()
    {
        $requests = MaintenanceRequest::with('tenant')->get();
        return response()->json($requests);
    }

    // POST /maintenance-requests - create new request
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id'   => 'required|exists:tenants,id',
            'description' => 'required|string',
            'status'      => 'sometimes|string',
        ]);

        $maintenance = MaintenanceRequest::create($request->all());
        return response()->json($maintenance, 201);
    }

    // GET /maintenance-requests/{id} - get single request
    public function show(string $id)
    {
        $maintenance = MaintenanceRequest::with('tenant')->find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance request not found'], 404);
        }

        return response()->json($maintenance);
    }

    // PUT /maintenance-requests/{id} - update request
    public function update(Request $request, string $id)
    {
        $maintenance = MaintenanceRequest::find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance request not found'], 404);
        }

        $request->validate([
            'tenant_id'   => 'sometimes|exists:tenants,id',
            'description' => 'sometimes|string',
            'status'      => 'sometimes|string',
        ]);

        $maintenance->update($request->all());
        return response()->json($maintenance);
    }

    // DELETE /maintenance-requests/{id} - delete request
    public function destroy(string $id)
    {
        $maintenance = MaintenanceRequest::find($id);

        if (!$maintenance) {
            return response()->json(['message' => 'Maintenance request not found'], 404);
        }

        $maintenance->delete();
        return response()->json(['message' => 'Maintenance request deleted successfully']);
    }
}