<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
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
            'website' => $this->faker->url,
            'about_me' => $this->faker->paragraph,
            'profile_image' => $this->faker->imageUrl(),
            'short_video' => $this->faker->url,
        ];
    }
}
