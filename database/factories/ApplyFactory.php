<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => Coach::inRandomOrder()->first(),
            'student_id' => Student::inRandomOrder()->first(),
            'status' => $this->faker->randomElement(['READ', 'UNREAD', 'STAR', 'TALKING', 'DELETE']),
        ];

    }
}
