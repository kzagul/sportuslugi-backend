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
        Schema::create('institution_service', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('institution_id')->constrained();
            $table->unsignedBigInteger('institution_id');
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            // $table->foreignId('service_id')->constrained();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_service');
    }
};
