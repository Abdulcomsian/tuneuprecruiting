<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apply;
use App\Models\Chat;
use App\Models\Coach;
use App\Models\Program;
use App\Models\Student;
use App\Models\StudentAttachments;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'), // You should hash the password
        ]);

        User::factory(10)->create();
        Coach::factory(10)->create();
        Student::factory(10)->create();
        StudentAttachments::factory()->count(5)->create();
        Program::factory(20)->create();
        Apply::factory(10)->create();
        Chat::factory(100)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
