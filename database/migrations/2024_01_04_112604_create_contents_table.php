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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->enum('content_type', ['quiz', 'lesson', 'resources']);
            $table->string('title');
            $table->string('content_path')->nullable();
            $table->unsignedDecimal('duration', 5, 2)->nullable();
            $table->integer('order_number');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
