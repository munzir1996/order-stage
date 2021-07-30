<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'longitude' => $this->faker->longitude($min = -180, $max = 180),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
            'description' => $this->faker->address,
            'resturant_id' => Resturant::factory()->create()->id,
        ];
    }
}
