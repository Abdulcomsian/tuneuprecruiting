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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id');
            $table->string('program_name')->nullable();
            $table->string('session')->nullable();
            $table->string('number_of_students')->nullable();
            $table->text('custom_fields')->nullable();
            $table->text('video')->nullable();
            $table->string('status')->default('public');
            $table->text('details')->nullable();
            $table->string('trash')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
