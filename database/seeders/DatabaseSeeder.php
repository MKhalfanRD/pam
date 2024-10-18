<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warga;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Warga::create([
            'user_id' => '1',
            'nama' => 'PANTI ASUHAN (YAYASAN)',
            'alamat' => 'A-1',
            'telp' => '087765412311',
        ]);
        Warga::create([
            'user_id' => '2',
            'nama' => 'PURNAWIRAWAN',
            'alamat' => 'A-5',
            'telp' => '087765412322',
        ]);
        Warga::create([
            'user_id' => '3',
            'nama' => 'PURWANTO',
            'alamat' => 'A-9',
            'telp' => '087765412333',
        ]);
    }
}
