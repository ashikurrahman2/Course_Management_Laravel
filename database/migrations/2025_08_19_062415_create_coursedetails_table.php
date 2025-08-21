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
        Schema::create('coursedetails', function (Blueprint $table) {
            $table->id();
            $table->string('course_overview')->nullable();
            $table->string('course_content')->nullable();
            $table->string('course_subcontent')->nullable();
            $table->string('course_teacherphoto')->nullable();
            $table->string('course_teacherintro')->nullable();
            $table->string('course_teacherdesignation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coursedetails');
    }
};
