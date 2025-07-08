<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'client_name' => fake()->name(),
        'client_email' => fake()->unique()->safeEmail(),
        'client_phone_number' => fake()->phoneNumber(),
        'company_name'=> fake()->company(),
        'company_address'=> fake()->address(),
        'company_city'=> fake()->city(),
        'company_zip' => fake()->postcode,
        'company_vat'=> fake()->unique()->numerify()
        ];
    }
}
