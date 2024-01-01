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
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('student_id')->unsigned();
            $table->unsignedBiginteger('program_id')->unsigned();
            $table->string('trash')->default('active');
            $table->string('star')->nullable();
            $table->string('talking')->nullable();
            $table->string('rating')->default('0');
            $table->string('read')->default('unread');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
