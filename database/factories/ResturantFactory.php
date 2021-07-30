<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResturantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resturant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory()->verified()->create()->id,
            'name_ar' => $this->faker->name(),
            'name_en' => $this->faker->name(),
            'branches_no' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'manager_name' => $this->faker->name(),
            'manager_phone' => $this->faker->unique()->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'commercial_registration_no' => $this->faker->randomNumber($nbDigits = null, $strict = true),
            'tax_registration_no' => $this->faker->randomNumber($nbDigits = null, $strict = true),
            'loyalty_points' => Resturant::NO,
            'category' => $this->faker->name(),
            'accepted_payment_methods' => $this->faker->name(),
            'services' => $this->faker->name(),
        ];
    }
}
