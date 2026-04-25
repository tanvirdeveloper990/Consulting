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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('email_one')->nullable();
            $table->string('email_two')->nullable();
            $table->longText('google_maps')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('copyright')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('text')->nullable();
            $table->string('study_image')->nullable();
            $table->string('choose_us_image')->nullable();

            $table->string('student_title')->nullable();
            $table->string('student_count')->nullable();
            $table->string('success_title')->nullable();
            $table->string('success_count')->nullable();
            $table->string('partner_title')->nullable();
            $table->string('partner_count')->nullable();
            $table->string('country_title')->nullable();
            $table->string('country_count')->nullable();
            $table->string('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
