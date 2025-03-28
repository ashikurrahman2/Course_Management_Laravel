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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_title')->nullable();
            $table->string('course_image')->nullable();
            $table->string('course_video')->nullable();
            $table->string('course_category')->nullable();
            $table->string('course_price')->nullable();
            $table->string('course_teacher')->nullable();
            $table->string('course_lavel')->nullable();
            $table->string('course_enrolled')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('course_learn')->nullable();
            $table->string('course_content_title')->nullable();
            $table->string('course_content_answer')->nullable();
            $table->string('course_content_requirement')->nullable();
            $table->string('course_audience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
