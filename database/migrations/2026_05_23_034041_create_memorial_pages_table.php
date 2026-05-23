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
        Schema::create('memorial_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('person_name');
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('subtitle')->default('Love left behind...');
            $table->string('verse_reference')->nullable();
            $table->text('verse_text_id');
            $table->text('verse_text_en');
            $table->text('description_id');
            $table->text('description_en');
            $table->string('wife_name')->nullable();
            $table->json('children')->nullable();
            $table->string('father_in_law')->nullable();
            $table->string('mother_in_law')->nullable();
            $table->string('funeral_resting_place');
            $table->string('burial_information');
            $table->string('schedule_closing_coffin');
            $table->string('schedule_comfort_service');
            $table->string('schedule_departure_service');
            $table->text('support_intro_id');
            $table->text('support_intro_en');
            $table->string('support_account_placeholder');
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorial_pages');
    }
};
