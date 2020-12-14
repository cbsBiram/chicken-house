<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Band;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => rand(10, 200),
            'price' => 2500,
            'total_price' => 0, 
            'buyer' => $this->faker->company,
            'band_id' => Band::all()->random()->id, 
        ];
    }
}
