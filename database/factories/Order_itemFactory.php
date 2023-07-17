<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_item>
 */
class Order_itemFactory extends Factory
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
            "order_id" => Order::pluck('id')->random(),
            "product_id" => Product::pluck('id')->random(),
            "quantity"=>$this->faker->numberBetween(1,10),
            "price"=>$this->faker->numberBetween(100000,10000000),
            
        ];
    }
}
