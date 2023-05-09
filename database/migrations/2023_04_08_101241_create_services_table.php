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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('literal')->unique()->nullable();
            $table->string('type')->nullable();
            // 
            $table->string('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('schedule')->nullable();
            $table->boolean('isFree')->nullable();
            $table->string('price')->nullable();
            $table->string('difficulty')->nullable();
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
