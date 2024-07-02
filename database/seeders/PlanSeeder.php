<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Basic',
                'slug' => 'basic',
                'stripe_plan' => 'price_1PXzpMGvKD8UhlGpWlOaF5hN',
                'price' => 10,
                'description' => 'Basic'
            ],

            [
                'name' => 'Premium',
                'slug' => 'premium',
                'stripe_plan' => 'price_1PXzpuGvKD8UhlGpTVslkIVh',
                'price' => 100,
                'description' => 'Premium'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
