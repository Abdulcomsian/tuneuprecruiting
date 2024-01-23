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
        Schema::create('student_additional_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apply_id');
            $table->unsignedBigInteger('request_requirement_id');
            $table->string('label');
            $table->string('type');
            $table->text('answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_additional_requirements');
    }
};
