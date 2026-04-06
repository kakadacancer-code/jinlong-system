<?php

namespace Database\Seeders;

use App\Models\Tenant; // 👈 add this!
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::create([
            'name'  => 'Sokha Chantha',
            'email' => 'sokha.chantha@gmail.com',
            'phone' => '012 345 678',
        ]);

        Tenant::create([
            'name'  => 'Dara Pich',
            'email' => 'dara.pich@gmail.com',
            'phone' => '011 234 567',
        ]);

        Tenant::create([
            'name'  => 'Bopha Sreymom',
            'email' => 'bopha.sreymom@gmail.com',
            'phone' => '096 123 456',
        ]);

        Tenant::create([
            'name'  => 'Vicheka Rith',
            'email' => 'vicheka.rith@gmail.com',
            'phone' => '078 987 654',
        ]);

        Tenant::create([
            'name'  => 'Channary Sok',
            'email' => 'channary.sok@gmail.com',
            'phone' => '085 456 789',
        ]);

        Tenant::create([
            'name'  => 'Piseth Mony',
            'email' => 'piseth.mony@gmail.com',
            'phone' => '093 321 654',
        ]);
    }
}