<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'business_id' => $this->faker->unique()->numerify('########'),
            'tax_id' => $tax_id = $this->faker->numerify('##########'),
            'vat_id' => 'SK' . $tax_id,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->numerify('##########')
        ];
    }
}
