<?php

namespace Database\Factories;

use App\Enums\TaskCategory;
use App\Enums\TaskStatus;
use App\Models\Task;
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
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(2),
            'category' => fake()->randomElement([
                TaskCategory::PERSONAL,
                TaskCategory::WORK,
                TaskCategory::URGENT
            ]),
            'status' => fake()->randomElement([
                TaskStatus::COMPLETED,
                TaskStatus::PENDING,
                TaskStatus::IN_PROGRESS
            ]),
            'due_at' => fake()->dateTimeBetween('+1 day', '+1 month'),
            'created_at' => fake()->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
