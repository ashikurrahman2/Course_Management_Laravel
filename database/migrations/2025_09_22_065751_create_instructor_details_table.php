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
        Schema::create('instructor_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_id'); // Foreign Key

             // About Me
            $table->string('about_me')->nullable();

            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            // Social Links
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();

            $table->timestamps();

            // Relation with instructors table
            $table->foreign('instructor_id')
                  ->references('id')->on('instractors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_details');
    }
};
