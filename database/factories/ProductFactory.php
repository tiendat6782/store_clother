<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            "name"=>$this->faker->name(),
            'category_id' => Category::pluck('id')->random(),
            "desc"=>$this->faker->name(),
            "price"=>$this->faker->randomFloat(0,100000,300000),
            "size"=>$this->faker->randomElement(['S','M','L','Xl','XXL']),
            "color"=>$this->faker->colorName(),
            "date_add"=>$this->faker->dateTime(),
            "status"=>1,
        ];
    }
}
