<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_courses_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->foreignId('instructor_id')->nullable()->constrained('users');
            $table->string('category')->nullable();
            $table->string('level')->default('beginner'); // beginner, intermediate, advanced
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('duration')->nullable(); // e.g., "6 weeks", "3 months"
            $table->integer('lessons_count')->default(0);
            $table->integer('students_enrolled')->default(0);
            $table->float('rating', 3, 2)->default(0.00);
            $table->integer('reviews_count')->default(0);
            $table->string('thumbnail')->nullable();
            $table->json('objectives')->nullable();
            $table->json('requirements')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->enum('status', ['draft', 'published', 'archived'])->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
