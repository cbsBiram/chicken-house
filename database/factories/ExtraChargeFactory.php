<?php

namespace Database\Factories;

use App\Models\ExtraCharge;
use App\Models\Band;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExtraChargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExtraCharge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => Str::random(8),
            'quantity' => 1,
            'price' => 9000,
            'band_id' => Band::all()->random()->id, 
        ];
    }
}
