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
            $table->string('home_phone')->nullable();
            $table->string('interest_level')->nullable();
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
