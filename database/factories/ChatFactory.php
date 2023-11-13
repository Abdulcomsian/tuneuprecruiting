<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coach_id' => Coach::inRandomOrder()->first(),
            'student_id' => Student::inRandomOrder()->first(),
            'message' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['unread', 'read']),
            'sender' => $this->faker->randomElement(['Coach', 'Student']),
        ];
    }
}
