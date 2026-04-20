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
            // Usamos 'name' em vez de 'title' conforme o teu Model
            'name' => $this->faker->sentence(3),
            
            // Um status simples (ex: 'pendente' ou 'em progresso')
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            
            // 'checked' como um booleano
            'checked' => $this->faker->boolean(false),
            
            // Descrição opcional
            'description' => $this->faker->realText(100),
        ];
    }
}
