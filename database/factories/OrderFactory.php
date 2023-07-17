<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'customer_id' => Customer::pluck('id')->random(),
            "order_date"=>$this->faker->dateTime(),
            "total_amount"=>$this->faker->numberBetween(100000,10000000),
            "status"=>2,
        ];
    }
}
