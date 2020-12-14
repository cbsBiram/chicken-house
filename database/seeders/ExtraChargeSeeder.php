<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ExtraCharge;

class ExtraChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExtraCharge::factory()->times(8)->create();
    }
}
