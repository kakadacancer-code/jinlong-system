<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@jinlong.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // Regular user
        User::create([
            'name'     => 'User',
            'email'    => 'user@jinlong.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        $this->call([
            PropertySeeder::class,
            UnitSeeder::class,
            TenantSeeder::class,
            LeaseSeeder::class,
            PaymentSeeder::class,
            MaintenanceRequestSeeder::class,
        ]);
    }
}