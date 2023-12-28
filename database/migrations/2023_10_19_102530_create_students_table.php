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
            $table->string('graduation_year')->nullable();
            $table->string('home_town')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('profile_image')->default('default.jpg');
            $table->string('short_video')->nullable();
            $table->string('cv')->nullable();
            $table->string('academic_honors')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('class_rank')->nullable();
            $table->string('college')->nullable();
            $table->string('core_gpa')->nullable();
            $table->string('gpa')->nullable();
            $table->string('gender')->nullable();
            $table->string('grad_year')->nullable();
            $table->string('height')->nullable();
            $table->string('interest_level')->nullable();

            $table->string('program_type')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('guardians_name')->nullable();
            $table->string('high_school_name')->nullable();
            $table->string('transcript')->nullable();
            $table->string('intended_major')->nullable();
            $table->string('registered_with_ncaa')->nullable();
            $table->string('ncaa_id')->nullable();
            $table->string('sat_math')->nullable();
            $table->string('sat_reading')->nullable();
            $table->string('sat')->nullable();
            $table->string('sat_writing')->nullable();
            $table->string('sat_total')->nullable();
            $table->string('act_total')->nullable();
            $table->string('academic_honor')->nullable();
            $table->string('other_interest')->nullable();
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
