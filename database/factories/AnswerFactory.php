<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{

    public function definition(): array
    {
        return [
            'body' => fake()->sentence(),
            'user_id' => 1,
            'quiz_id' => 1
        ];
    }
}
