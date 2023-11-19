<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramQuestion>
 */
class ProgramQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'program_id' => Program::inRandomOrder()->first(),
            'label' => $this->faker->sentence,
            'answer' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['text', 'select', 'file']),
        ];
    }
}
