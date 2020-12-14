<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Band::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => $this->faker->word,
            'quantity' => rand(1, 500),
            'loss' => 0,
            'unit_price' => 500,
            'provider' => $this->faker->company,
            'user_id' => User::all()->random()->id,
        ];
    }
}
