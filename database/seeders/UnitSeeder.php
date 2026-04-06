<?php

namespace Database\Seeders;

use App\Models\Unit; // 👈 add this!
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        // Property 1 - Sunrise Apartment (id: 1)
        Unit::create(['property_id' => 1, 'unit_number' => 'A-101', 'status' => 'occupied']);
        Unit::create(['property_id' => 1, 'unit_number' => 'A-102', 'status' => 'available']);
        Unit::create(['property_id' => 1, 'unit_number' => 'A-103', 'status' => 'available']);

        // Property 2 - Green Villa (id: 2)
        Unit::create(['property_id' => 2, 'unit_number' => 'B-201', 'status' => 'occupied']);
        Unit::create(['property_id' => 2, 'unit_number' => 'B-202', 'status' => 'available']);

        // Property 3 - City Center Flat (id: 3)
        Unit::create(['property_id' => 3, 'unit_number' => 'C-301', 'status' => 'occupied']);
        Unit::create(['property_id' => 3, 'unit_number' => 'C-302', 'status' => 'maintenance']);
        Unit::create(['property_id' => 3, 'unit_number' => 'C-303', 'status' => 'available']);

        // Property 4 - River View Condo (id: 4)
        Unit::create(['property_id' => 4, 'unit_number' => 'D-401', 'status' => 'occupied']);
        Unit::create(['property_id' => 4, 'unit_number' => 'D-402', 'status' => 'available']);

        // Property 5 - Golden Residence (id: 5)
        Unit::create(['property_id' => 5, 'unit_number' => 'E-501', 'status' => 'available']);
        Unit::create(['property_id' => 5, 'unit_number' => 'E-502', 'status' => 'occupied']);
    }
}