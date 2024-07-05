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
                'name' => 'Essential/Monthly',
                'slug' => 'essential-monthly',
                'stripe_plan' => 'price_1PXzpMGvKD8UhlGpWlOaF5hN',
                'price' => 200,
            ],

            [
                'name' => 'Essential/Yearly',
                'slug' => 'essential-yearly',
                'stripe_plan' => 'price_1PXzpuGvKD8UhlGpTVslkIVh',
                'price' => 400,
            ],

            [
                'name' => 'Exclusive/Annual',
                'slug' => 'exclusive-annual',
                'stripe_plan' => 'price_1PZ6XnGvKD8UhlGpEoGYaK2D',
                'price' => 1000,
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
