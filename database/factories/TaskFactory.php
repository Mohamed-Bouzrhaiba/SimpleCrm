<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'deadline'=>fake()->dateTimeBetween('+1 month', '+6 month'),
            'status' => fake()->randomElement(TaskStatusEnum::cases())->value,
            'user_id' => User::pluck('id')->random(),
            'client_id' => Client::pluck('id')->random(),
            'project_id' => Project::pluck('id')->random(),
        ];
    }
}
