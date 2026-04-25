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
        Schema::create('student_supports', function (Blueprint $table) {
            $table->id();
            $table->string('title_1')->nullable();
            $table->string('title_2')->nullable();
            $table->text('description')->nullable();
            $table->string('personalized_title')->nullable();
            $table->text('personalized_description')->nullable();
            $table->string('personalized_icon')->nullable();
            $table->string('personalized_image')->nullable();
            $table->string('university_title')->nullable();
            $table->text('university_description')->nullable();
            $table->string('university_icon')->nullable();
            $table->string('university_image')->nullable();
            $table->string('admission_title')->nullable();
            $table->text('admission_description')->nullable();
            $table->string('admission_icon')->nullable();
            $table->string('admission_image')->nullable();
            $table->string('admission_title1')->nullable();
            $table->text('admission_description1')->nullable();
            $table->string('admission_icon1')->nullable();
            $table->string('admission_image1')->nullable();
            $table->string('financial_title')->nullable();
            $table->text('financial_description')->nullable();
            $table->string('financial_icon')->nullable();
            $table->string('financial_image')->nullable();
            $table->string('visa_title')->nullable();
            $table->text('visa_description')->nullable();
            $table->string('visa_icon')->nullable();
            $table->string('visa_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_supports');
    }
};
