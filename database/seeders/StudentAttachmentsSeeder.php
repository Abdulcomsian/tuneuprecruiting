<?php

namespace Database\Seeders;

use App\Models\StudentAttachments;
use Database\Factories\StudentAttachmentsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentAttachmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAttachments::factory()->count(5)->create();
    }
}
