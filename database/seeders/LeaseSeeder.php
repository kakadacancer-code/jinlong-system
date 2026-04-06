<?php

namespace Database\Seeders;

use App\Models\Lease; // 👈 added!
use Illuminate\Database\Seeder;

class LeaseSeeder extends Seeder
{
    public function run(): void
    {
        Lease::create([
            'tenant_id'  => 1,
            'unit_id'    => 1,
            'start_date' => '2026-01-01',
            'status'     => 'active',
        ]);

        Lease::create([
            'tenant_id'  => 2,
            'unit_id'    => 4,
            'start_date' => '2026-02-01',
            'status'     => 'active',
        ]);

        Lease::create([
            'tenant_id'  => 3,
            'unit_id'    => 6,
            'start_date' => '2026-01-15',
            'status'     => 'active',
        ]);

        Lease::create([
            'tenant_id'  => 4,
            'unit_id'    => 9,
            'start_date' => '2026-03-01',
            'status'     => 'active',
        ]);

        Lease::create([
            'tenant_id'  => 5,
            'unit_id'    => 12,
            'start_date' => '2026-03-15',
            'status'     => 'active',
        ]);

        Lease::create([
            'tenant_id'  => 6,
            'unit_id'    => 7,
            'start_date' => '2025-10-01',
            'status'     => 'expired',
        ]);
    }
}