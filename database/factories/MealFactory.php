<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'desc'  => $this->faker->text(40),
            'featured'  => $this->faker->imageUrl(250, 300),
            'price' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->lastName,
            'restaurant_id' => $this->faker->numberBetween(1, 10),
            'category_id'   => $this->faker->numberBetween(1, 5)
        ];
    }
}
