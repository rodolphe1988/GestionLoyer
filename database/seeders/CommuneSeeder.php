<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        DB::table('table_commune')->insert([
            ['commune' => 'Cocody'],
            ['commune' => 'Yopougon'],
            ['commune' => 'Abobo'],
            ['commune' => 'Plateau'],
            ['commune' => 'Treichville'],
            ['commune' => 'Marcory'],
            ['commune' => 'Koumassi'],
            ['commune' => 'Port-Bouët'],
            ['commune' => 'Adjamé'],
            ['commune' => 'Bingerville'],
        ]);
}

}