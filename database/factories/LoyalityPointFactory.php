<?php

namespace Database\Factories;

use App\Models\LoyalityPoint;
use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoyalityPointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoyalityPoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'points' => $this->faker->numberBetween($min = 1, $max = 100),
            'amount' => $this->faker->numberBetween($min = 1, $max = 100),
            'resturant_id' => Resturant::factory()->create()->id,
        ];
    }
}
