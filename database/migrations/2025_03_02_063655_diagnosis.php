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
        //
        Schema::create('diagnoses', function ($table) {
            $table->id();
            $table->string('user_nama');
            $table->json('answer_log');
            $table->unsignedBigInteger('penyakit_id')->nullable();
            $table->timestamps();
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('diagnoses');
    }
};