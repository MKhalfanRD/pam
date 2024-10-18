<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warga::create(['name' => 'Warga 1', 'email' => 'warga1@example.com', 'phone' => '081234567890']);
        Warga::create(['name' => 'Warga 2', 'email' => 'warga2@example.com', 'phone' => '081234567891']);
        Warga::create(['name' => 'Warga 3', 'email' => 'warga3@example.com', 'phone' => '081234567892']);
    }
}
