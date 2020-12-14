<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Band;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Band::factory()->times(4)->create();
    }
}
