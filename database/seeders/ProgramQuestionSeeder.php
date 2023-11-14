<?php

namespace Database\Seeders;

use App\Models\ProgramQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramQuestion::factory()->count(20)->create();
    }
}
