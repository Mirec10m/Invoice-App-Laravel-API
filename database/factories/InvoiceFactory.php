<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $number = $this->faker->numerify(Carbon::now()->year . '#####'),
            'variable_symbol' => $number,
            'due_at' => Carbon::now()->format('Y-m-d'),
            'item' => $this->faker->text(40),
            'price' => $this->faker->numberBetween(10, 1000)
        ];
    }
}
