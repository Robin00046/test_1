<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penduduk;
use App\Models\Provinsi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kabupaten;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Provinsi::factory(5)->create();
        Kabupaten::factory(10)->create();
        // You can also create 1000 Penduduk records if needed
        Penduduk::factory(1000)->create();
    }
}
