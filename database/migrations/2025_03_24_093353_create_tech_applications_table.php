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
        Schema::create('tech_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->json('skills_interested')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('learning_preference')->nullable();
            $table->string('language_preference')->nullable();
            $table->string('device_preference')->nullable();
            $table->string('learning_goal')->nullable();
            $table->string('course_format_preference')->nullable();
            $table->string('price_range')->nullable();
            $table->boolean('interested_in_mentorship')->nullable();
            $table->boolean('interested_in_certification')->nullable();
            $table->boolean('joined_whatsapp')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_applications');
    }
};
