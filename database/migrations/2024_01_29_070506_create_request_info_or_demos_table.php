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
        Schema::create('request_info_or_demos', function (Blueprint $table) {
            $table->id();
            $table->string('university_name');
            $table->string('email')->unique();
            $table->string('college_or_university');
            $table->string('info');
            $table->string('status')->default('new');
            $table->string('read')->default('unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_info_or_demos');
    }
};
