<?php

namespace Database\Factories;

use App\Models\Apply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplyDetail>
 */
class ApplyDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'apply_id' => Apply::inRandomOrder()->first(),
            'label' => $this->faker->sentence,
            'answer' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['text', 'select', 'file']),
        ];
    }
}
