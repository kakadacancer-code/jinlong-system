<?php

namespace Database\Seeders;

use App\Models\Payment; // 👈 added!
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        // Lease 1 - Sokha Chantha
        Payment::create(['lease_id' => 1, 'amount' => 350.00, 'payment_date' => '2026-01-01', 'status' => 'paid']);
        Payment::create(['lease_id' => 1, 'amount' => 350.00, 'payment_date' => '2026-02-01', 'status' => 'paid']);
        Payment::create(['lease_id' => 1, 'amount' => 350.00, 'payment_date' => '2026-03-01', 'status' => 'unpaid']);

        // Lease 2 - Dara Pich
        Payment::create(['lease_id' => 2, 'amount' => 400.00, 'payment_date' => '2026-02-01', 'status' => 'paid']);
        Payment::create(['lease_id' => 2, 'amount' => 400.00, 'payment_date' => '2026-03-01', 'status' => 'paid']);

        // Lease 3 - Bopha Sreymom
        Payment::create(['lease_id' => 3, 'amount' => 300.00, 'payment_date' => '2026-01-15', 'status' => 'paid']);
        Payment::create(['lease_id' => 3, 'amount' => 300.00, 'payment_date' => '2026-02-15', 'status' => 'unpaid']);

        // Lease 4 - Vicheka Rith
        Payment::create(['lease_id' => 4, 'amount' => 500.00, 'payment_date' => '2026-03-01', 'status' => 'paid']);

        // Lease 5 - Channary Sok
        Payment::create(['lease_id' => 5, 'amount' => 450.00, 'payment_date' => '2026-03-15', 'status' => 'paid']);

        // Lease 6 - Piseth Mony
        Payment::create(['lease_id' => 6, 'amount' => 280.00, 'payment_date' => '2025-10-01', 'status' => 'paid']);
        Payment::create(['lease_id' => 6, 'amount' => 280.00, 'payment_date' => '2025-11-01', 'status' => 'paid']);
    }
}