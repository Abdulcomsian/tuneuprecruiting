<?php

namespace Database\Seeders;

use App\Models\ApplyDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplyDetail::factory()->count(20)->create();
    }
}
