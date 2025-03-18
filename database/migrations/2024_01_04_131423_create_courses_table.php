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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); 
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'all-levels'])->default('all-levels');
            $table->enum('language', ['english', 'hausa'])->default('english');
            $table->boolean('featured')->default(false);
            $table->boolean('is_free')->default(false);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->boolean('has_discount')->default(false);
            $table->string('featured_video')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('tags')->nullable();
            $table->integer('duration_minutes')->nullable(); 
            $table->boolean('published')->default(false); 
            $table->timestamps();
            $table->softDeletes(); 
            
            // Add indexes for common queries
            $table->index('featured');
            $table->index(['published', 'featured']);
            $table->index(['level', 'language']);
        });

        // Add foreign key constraints if needed
        $this->addForeignKeys();
    }

    protected function addForeignKeys()
    {
        Schema::table('courses', function (Blueprint $table) {
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('provider_id')->references('id')->on('providers')->onDelete('set null');
            // Add other foreign keys as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
