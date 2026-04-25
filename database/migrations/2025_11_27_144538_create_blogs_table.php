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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('thumbnail_one')->nullable();
            $table->string('thumbnail_two')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('country')->nullable();
            $table->string('study-level')->nullable();
            $table->string('application_deadline')->nullable();
            $table->string('intake')->nullable();
            $table->text('short_description')->nullable();
            $table->string('story_date')->nullable();
            $table->string('story_post')->nullable();
            $table->string('story_view')->nullable();
            $table->longText('description')->nullable();
            $table->string('tags')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
