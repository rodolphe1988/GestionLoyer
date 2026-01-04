<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('table_ville')->insert([
            ['ville' => 'Abidjan'],
            ['ville' => 'Yamoussoukro'],
            ['ville' => 'Bouaké'],
            ['ville' => 'San Pedro'],
        ]);
    }
}
