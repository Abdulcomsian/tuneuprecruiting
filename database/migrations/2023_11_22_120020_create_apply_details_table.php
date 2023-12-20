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
        Schema::create('apply_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apply_id');
            $table->string('label');
            $table->string('type');
            $table->text('answer')->nullable();
            $table->string('trash')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_details');
    }
};
