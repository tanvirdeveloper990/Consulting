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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('honesty')->nullable();
            $table->string('municipality')->nullable();
            $table->string('id_number')->nullable();
            $table->string('sex')->nullable();
            $table->string('nationality')->nullable();
            $table->string('health_certificate_number')->nullable();
            $table->string('profession')->nullable();
            $table->string('date_of_issuance_of_the_health_certificate_hijri_calendar')->nullable();
            $table->string('date_of_issuance_of_the_health_certificate_gregorian_calendar')->nullable();
            $table->string('health_certificate_expiry_date_hijri_calendar')->nullable();
            $table->string('health_certificate_expiry_date_gregorian_calendar')->nullable();
            $table->string('type_of_educational_program')->nullable();
            $table->string('educational_program_end_date')->nullable();
            $table->string('license_number')->nullable();
            $table->string('name_of_establishment')->nullable();
            $table->string('establishment_number')->nullable();
            $table->string('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
