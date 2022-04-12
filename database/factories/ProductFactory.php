<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            
            'buy_price' => $this->faker->numberBetween(1000, 4500),
            'sell_price' => $this->faker->numberBetween(5000, 10000),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'qty' => $this->faker->numberBetween(1, 50),

        ];
    }
}
