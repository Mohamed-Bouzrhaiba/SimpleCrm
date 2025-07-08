<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use App\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title'=>fake()->sentence(),
            'description' => fake()->text(),
            'deadline' => now()->addDays(rand(1,30))->format('Y-m-d'),
            'status'=>fake()->randomElement(StatusEnum::cases())->value,
            'user_id' => User::pluck('id')->random(),
            'client_id'=>Client::pluck('id')->random(),
        ];
    }
}
