<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Aliment;

class AlimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aliment::factory()->times(10)->create();
    }
}
