<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instractor_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_id'); // foreign key
            $table->text('about_me');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();

            $table->foreign('instructor_id')->references('id')->on('instractors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instractor_details');
    }
};
