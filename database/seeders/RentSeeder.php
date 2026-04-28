<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rent;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rent::create([
            'tenant_name' => 'kakada',
            'property_name' => 'Test Property',
            'price' => 100,
            'start_date' => '2026-01-01',
            'end_date' => '2026-12-31',
         ]);
    }
}
