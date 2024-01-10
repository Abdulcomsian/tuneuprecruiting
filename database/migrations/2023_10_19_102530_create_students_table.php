<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('preferred_name')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('are_u_from_usa')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('guardians_name')->nullable();
            $table->string('guardians_phone_number')->nullable();
            $table->string('program_type')->nullable();
            $table->string('gender')->nullable();

            // academic information
            $table->string('high_school_name')->nullable();
            $table->string('registered_with_ncaa')->nullable();
            $table->string('ncaa_id')->nullable(); // new
            $table->string('gpa')->nullable();
            $table->string('sat_test_date')->nullable(); // new
            $table->string('sat_reading')->nullable();
            $table->string('sat_writing')->nullable();
            $table->string('sat_math')->nullable();
            $table->string('sat_total')->nullable();
            $table->string('act_test_date')->nullable(); // new
            $table->string('act_sum_score')->nullable(); // new
            $table->string('act_composite')->nullable(); // new
            $table->string('act_english')->nullable(); // new
            $table->string('act_math')->nullable(); // new
            $table->string('act_reading')->nullable(); // new
            $table->string('act_science')->nullable(); // new
            $table->string('transcript')->nullable();

            $table->string('profile_image')->default('default.jpg');
            $table->string('short_video')->nullable();
            $table->string('cv')->nullable();

            $table->string('trash')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
