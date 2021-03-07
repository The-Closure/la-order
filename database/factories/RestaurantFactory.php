<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'logo'  => $this->faker->imageUrl(250, 300),
            'has_delivery'  => $this->faker->boolean(),
            'working_hours' => $this->faker->numberBetween(0, 12) . '-' . $this->faker->numberBetween(0, 12),
            'rating'    => $this->faker->numberBetween(0, 5),
            'epayment'  => $this->faker->boolean(),
        ];
    }
}
