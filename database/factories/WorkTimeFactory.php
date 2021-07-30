<?php

namespace Database\Factories;

use App\Models\Resturant;
use App\Models\WorkTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkTimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkTime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_period_start' => $this->faker->numberBetween($min = 1, $max = 12),
            'first_period_end' => $this->faker->numberBetween($min = 1, $max = 12),
            'second_period_start' => $this->faker->numberBetween($min = 1, $max = 12),
            'second_period_end' => $this->faker->numberBetween($min = 1, $max = 12),
            'resturant_id' => Resturant::factory()->create()->id,
        ];
    }
}
