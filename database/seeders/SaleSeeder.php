<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::factory()->times(15)->create();
    }
}
