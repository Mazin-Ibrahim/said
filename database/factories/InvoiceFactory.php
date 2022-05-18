<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'customer_id' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->numberBetween(100, 1000),
            'discount' => $this->faker->numberBetween(1,10),
            'total_after_discount' => Invoice::calculateTotalAfterDiscount($this->faker->numberBetween(100, 1000), $this->faker->numberBetween(1, 10)),
            'type_of_payment' => $this->faker->randomElement(['cash','credit']),
            'maintenance_id' => $this->faker->numberBetween(1, 10), 
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
