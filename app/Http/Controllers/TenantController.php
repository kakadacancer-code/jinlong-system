<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    public function index()
    {
        $title = "Tenants";
        $tenants = Tenant::all();

        return view('tenants.index', compact('title', 'tenants'));
    }
    public function form()
    {
        return view('tenants.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'nullable|string|max:50',
            'email'  => 'nullable|email',
            'status' => 'required|in:active,pending,expired',
        ]);

        Tenant::create($validated);

        return redirect()->route('tenants.index')
                        ->with('success', 'Tenant created successfully.');
    }
}
