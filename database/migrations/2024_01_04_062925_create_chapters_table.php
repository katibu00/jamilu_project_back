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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order_number');
            $table->boolean('is_free')->default(false); // Add to allow preview chapters
            $table->boolean('published')->default(false); // Add to control visibility
            $table->timestamps();
            $table->softDeletes(); // Add soft deletes for chapters
            
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
            // Add unique constraint for order within a course
            $table->unique(['course_id', 'order_number']);
            
            // Add index for common queries
            $table->index(['course_id', 'published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
