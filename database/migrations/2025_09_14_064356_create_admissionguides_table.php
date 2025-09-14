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
        Schema::create('admissionguides', function (Blueprint $table) {
            $table->id();
            $table->string('guide_title')->nullable();
            $table->string('guide_content')->nullable();
            $table->string('guide_image')->nullable();
            $table->date('close_admission')->nullable();
            $table->string('session')->nullable();
            $table->string('closing_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissionguides');
    }
};
