<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'coach')->inRandomOrder()->first();

        if (!$user) {
            // Handle the case where no coach users exist
            return [];
        }

        return [
            'user_id' => $user->id,
            'program_name' => $this->faker->word,
            'session' => $this->faker->numberBetween(1999, 2023),
            'number_of_students' => $this->faker->numberBetween(5, 20),
            'details' => $this->faker->paragraph,
        ];
    }
}
