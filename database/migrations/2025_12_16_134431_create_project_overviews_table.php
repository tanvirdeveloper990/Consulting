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
        Schema::create('project_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('we_are_title')->nullable();
            $table->string('we_are_title1')->nullable();
            $table->text('we_are_description')->nullable();

            $table->string('student_support_title')->nullable();
            $table->string('student_support_title1')->nullable();
            $table->text('student_support_description')->nullable();

            $table->string('why_choose_us_title')->nullable();
            $table->string('why_choose_us_title1')->nullable();
            $table->text('why_choose_us_description')->nullable();

            $table->string('top_study_destination_title')->nullable();
            $table->string('top_study_destination_title1')->nullable();
            $table->text('top_study_destination_description')->nullable();

            $table->string('inspiring_stories_title')->nullable();
            $table->string('inspiring_stories_title1')->nullable();
            $table->text('inspiring_stories_description')->nullable();

            $table->string('top_rated_universities_title')->nullable();
            $table->string('top_rated_universities_title1')->nullable();
            $table->text('top_rated_universities_description')->nullable();

            $table->string('frequently_asked_question_title')->nullable();
            $table->string('frequently_asked_question_title1')->nullable();
            $table->text('frequently_asked_question_description')->nullable();

            $table->string('still_have_questions_title')->nullable();
            $table->string('still_have_questions_title1')->nullable();
            $table->text('still_have_questions_description')->nullable();

            $table->string('news_and_updates_title')->nullable();
            $table->string('news_and_updates_title1')->nullable();
            $table->text('news_and_updates_description')->nullable();

            $table->string('our_parents_title')->nullable();
            $table->string('our_parents_title1')->nullable();
            $table->text('our_parents_description')->nullable();

            $table->string('ready_to_study_title')->nullable();
            $table->string('ready_to_study_title1')->nullable();
            $table->text('ready_to_study_description')->nullable();

            $table->string('contact_us_title')->nullable();
            $table->string('contact_us_title1')->nullable();
            $table->text('contact_us_description')->nullable();

            $table->string('find_us_title')->nullable();
            $table->string('buisness_hours')->nullable();
            $table->text('find_us_description')->nullable();

            $table->string('apply_title')->nullable();
            $table->text('apply_description')->nullable();

            $table->string('gallery_message')->nullable();
            $table->string('gallery_title1')->nullable();
            $table->string('gallery_title2')->nullable();
            $table->text('gallery_description')->nullable();

            $table->string('certificate_message')->nullable();
            $table->string('certificate_title1')->nullable();
            $table->string('certificate_title2')->nullable();
            $table->text('certificate_description')->nullable();

            $table->string('admission_requirement_title')->nullable();
            $table->text('admission_requirement_description')->nullable();

            $table->string('message_title')->nullable();
            $table->text('message_description')->nullable();

            $table->string('our_gallery_title')->nullable();
            $table->text('our_gallery_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_overviews');
    }
};
