<?php

namespace Database\Seeders;

use App\Models\Apply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apply::factory()->count(10)->create();
    }
}
