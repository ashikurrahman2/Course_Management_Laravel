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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->text('course_overview')->nullable();
            $table->longText('course_content')->nullable();
            $table->longText('course_subcontent')->nullable();
            $table->string('course_teacherphoto')->nullable();
            $table->text('course_teacherintro')->nullable();
            $table->string('course_teacherdesignation')->nullable();
            $table->string('pass_parcentage')->nullable();
            $table->string('course_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
