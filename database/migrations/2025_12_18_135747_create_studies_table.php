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
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('country_id')->nullable();
            $table->text('short_description')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            
            $table->string('partner_university_title')->nullable();
            $table->string('partner_university_count')->nullable();

            $table->string('students_enrolled_title')->nullable();
            $table->string('students_enrolled_count')->nullable();

            $table->string('success_rate_title')->nullable();
            $table->string('success_rate_count')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studies');
    }
};
