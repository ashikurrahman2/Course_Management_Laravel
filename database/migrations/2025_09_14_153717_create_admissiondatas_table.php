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
        Schema::create('admissiondatas', function (Blueprint $table) {
            $table->id();
            $table->string('stu_name')->nullable();
            $table->string('stu_email')->nullable();
            $table->string('stu_phone')->nullable();
            $table->string('stu_gender')->nullable();
            $table->string('stu_course')->nullable();
            $table->string('stu_address')->nullable();
            $table->string('stu_division')->nullable();
            $table->string('stu_distict')->nullable();
            $table->string('stu_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissiondatas');
    }
};
