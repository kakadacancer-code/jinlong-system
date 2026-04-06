<?php

namespace Database\Seeders;

use App\Models\MaintenanceRequest; // 👈 added!
use Illuminate\Database\Seeder;

class MaintenanceRequestSeeder extends Seeder
{
    public function run(): void
    {
        MaintenanceRequest::create([
            'tenant_id'   => 1,
            'description' => 'Air conditioning is not cooling properly in the bedroom.',
            'status'      => 'in_progress',
        ]);

        MaintenanceRequest::create([
            'tenant_id'   => 2,
            'description' => 'Water leaking from the bathroom ceiling.',
            'status'      => 'pending',
        ]);

        MaintenanceRequest::create([
            'tenant_id'   => 3,
            'description' => 'Electricity in the kitchen keeps tripping the breaker.',
            'status'      => 'pending',
        ]);

        MaintenanceRequest::create([
            'tenant_id'   => 4,
            'description' => 'Front door lock is broken and cannot be locked from outside.',
            'status'      => 'resolved',
        ]);

        MaintenanceRequest::create([
            'tenant_id'   => 5,
            'description' => 'Window in the living room is cracked and needs replacement.',
            'status'      => 'pending',
        ]);

        MaintenanceRequest::create([
            'tenant_id'   => 6,
            'description' => 'Hot water heater is not working.',
            'status'      => 'resolved',
        ]);
    }
}