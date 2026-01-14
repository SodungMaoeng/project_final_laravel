<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop if exists and recreate
        Schema::dropIfExists('courses');

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('discount')->default(0);
            $table->string('image')->nullable();
            $table->string('status')->default('draft'); // Add this line!
            $table->string('video')->nullable(); // If you need video column
            $table->date('start_date')->nullable();
            $table->foreignId('instructor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
