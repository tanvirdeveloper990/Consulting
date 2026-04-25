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
        Schema::create('advanced_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('application_title')->nullable();
            $table->string('application_count')->nullable();
            $table->string('application_image')->nullable();
            $table->string('experience_title')->nullable();
            $table->string('experience_count')->nullable();
            $table->string('experience_image')->nullable();
            $table->string('satisfied_title')->nullable();
            $table->string('satisfied_count')->nullable();
            $table->string('satisfied_image')->nullable();
            $table->string('university_title')->nullable();
            $table->string('university_count')->nullable();
            $table->string('university_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advanced_studies');
    }
};
