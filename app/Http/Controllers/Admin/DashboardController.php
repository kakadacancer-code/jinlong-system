<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\MaintenanceRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'properties'           => Property::count(),
            'units'                => Unit::count(),
            'tenants'              => Tenant::count(),
            'leases'               => Lease::count(),
            'payments'             => Payment::count(),
            'maintenanceRequests'  => MaintenanceRequest::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}