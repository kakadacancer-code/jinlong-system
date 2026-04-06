<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    // GET /tenants - get all tenants
    public function index()
    {
        $tenants = Tenant::with(['leases', 'maintenanceRequests'])->get();
        return response()->json($tenants);
    }

    // POST /tenants - create new tenant
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:tenants,email',
            'phone' => 'required|string',
        ]);

        $tenant = Tenant::create($request->all());
        return response()->json($tenant, 201);
    }

    // GET /tenants/{id} - get single tenant
    public function show(string $id)
    {
        $tenant = Tenant::with(['leases', 'maintenanceRequests'])->find($id);

        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        return response()->json($tenant);
    }

    // PUT /tenants/{id} - update tenant
    public function update(Request $request, string $id)
    {
        $tenant = Tenant::find($id);

        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $request->validate([
            'name'  => 'sometimes|string',
            'email' => 'sometimes|email|unique:tenants,email,' . $id,
            'phone' => 'sometimes|string',
        ]);

        $tenant->update($request->all());
        return response()->json($tenant);
    }

    // DELETE /tenants/{id} - delete tenant
    public function destroy(string $id)
    {
        $tenant = Tenant::find($id);

        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $tenant->delete();
        return response()->json(['message' => 'Tenant deleted successfully']);
    }
}