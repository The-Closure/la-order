<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total'  => $this->faker->text,
            'status' =>$this->faker->lastname,
            'note' =>$this->faker->name,
            'rating' =>$this->faker->numberBetween(0, 10),
            'feedback' =>$this->faker->name,
            'method' =>$this->faker->name,
            'customer_id' =>$this->faker->numberBetween(1, 20),
            'delivary_id' =>$this->faker->numberBetween(1, 10),

            
        ];
    }
}
