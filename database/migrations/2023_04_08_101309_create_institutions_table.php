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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('literal')->unique()->nullable();
            $table->string('inn')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contactuser')->unique()->nullable();
            // 
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('workingTime')->nullable();
            // 
            $table->string('address')->nullable();
            $table->string('coordinates')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
