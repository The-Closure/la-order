<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city'  => $this->faker->name,
            'street'  => $this->faker->name,
            'details'  => $this->faker->text(40),
            'user_id' => $this->faker->numberBetween(1, 20),
            'area_id'   => $this->faker->numberBetween(1,12)
        ];
    }
}
