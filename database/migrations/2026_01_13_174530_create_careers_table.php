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
    Schema::create('careers', function (Blueprint $table) {
        $table->id();
        $table->timestamps();

        // General
        $table->string('title')->nullable();
        $table->text('description')->nullable();

        // Box counts
        $table->string('box_one_title')->nullable();
        $table->string('box_one_count')->nullable();
        $table->string('box_two_title')->nullable();
        $table->string('box_two_count')->nullable();

        // Lists 1-4
        $table->string('list1_tile')->nullable();
        $table->text('list1_subtitle')->nullable();
        $table->string('list2_tile')->nullable();
        $table->text('list2_subtitle')->nullable();
        $table->string('list3_tile')->nullable();
        $table->text('list3_subtitle')->nullable();
        $table->string('list4_tile')->nullable();
        $table->text('list4_subtitle')->nullable();

        // Why work section
        $table->string('why_work_title')->nullable();
        $table->text('why_work_description')->nullable();

        // Boxes 1-6
        $table->string('box1_icon')->nullable();
        $table->string('box1_title')->nullable();
        $table->text('box1_description')->nullable();

        $table->string('box2_icon')->nullable();
        $table->string('box2_title')->nullable();
        $table->text('box2_description')->nullable();

        $table->string('box3_icon')->nullable();
        $table->string('box3_title')->nullable();
        $table->text('box3_description')->nullable();

        $table->string('box4_icon')->nullable();
        $table->string('box4_title')->nullable();
        $table->text('box4_description')->nullable();

        $table->string('box5_icon')->nullable();
        $table->string('box5_title')->nullable();
        $table->text('box5_description')->nullable();

        $table->string('box6_icon')->nullable();
        $table->string('box6_title')->nullable();
        $table->text('box6_description')->nullable();

        // Current openings
        $table->string('current_opening_title')->nullable();
        $table->text('current_opening_description')->nullable();

        // List one-five
        $table->string('list_one_tile')->nullable();
        $table->string('list_one_time')->nullable();
        $table->string('list_one_country')->nullable();
        $table->text('list_one_description')->nullable();
        $table->string('list_one_tag')->nullable();

        $table->string('list_two_tile')->nullable();
        $table->string('list_two_time')->nullable();
        $table->string('list_two_country')->nullable();
        $table->text('list_two_description')->nullable();
        $table->string('list_two_tag')->nullable();

        $table->string('list_three_tile')->nullable();
        $table->string('list_three_time')->nullable();
        $table->string('list_three_country')->nullable();
        $table->text('list_three_description')->nullable();
        $table->string('list_three_tag')->nullable();

        $table->string('list_four_tile')->nullable();
        $table->string('list_four_time')->nullable();
        $table->string('list_four_country')->nullable();
        $table->text('list_four_description')->nullable();
        $table->string('list_four_tag')->nullable();

        $table->string('list_five_tile')->nullable();
        $table->string('list_five_time')->nullable();
        $table->string('list_five_country')->nullable();
        $table->text('list_five_description')->nullable();
        $table->string('list_five_tag')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
