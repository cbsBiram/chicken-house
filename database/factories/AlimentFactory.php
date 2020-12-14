<?php

namespace Database\Factories;

use App\Models\Aliment;
use App\Models\Band;

use Illuminate\Database\Eloquent\Factories\Factory;


class AlimentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aliment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => rand(1, 10),
            'price' => 15000,
            'weight' => 50,
            'band_id' => Band::all()->random()->id,
        ];
    }
}
