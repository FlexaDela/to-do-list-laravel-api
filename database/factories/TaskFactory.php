<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),

            'phase' => $this->faker->randomElement(['initian', 'developing', 'finished']),

            'status' => $this->faker->boolean(0.5),

            'description' => $this->faker->realText(100),
        ];
    }
}
