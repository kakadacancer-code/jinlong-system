<?php

namespace Database\Seeders;

use App\Models\Property; // 👈 add this!
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::create(['name' => 'Sunrise Apartment',  'location' => 'Phnom Penh, BKK1']);
        Property::create(['name' => 'Green Villa',        'location' => 'Phnom Penh, Toul Kork']);
        Property::create(['name' => 'City Center Flat',   'location' => 'Phnom Penh, Daun Penh']);
        Property::create(['name' => 'River View Condo',   'location' => 'Phnom Penh, Chroy Changvar']);
        Property::create(['name' => 'Golden Residence',   'location' => 'Siem Reap, Svay Dangkum']);
    }
}