<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->date('enrollment_date')->default(now());
            $table->date('completion_date')->nullable();
            $table->enum('status', ['active', 'completed', 'dropped', 'pending'])->default('active');
            $table->decimal('progress', 5, 2)->default(0.00); // percentage
            $table->decimal('grade', 5, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'course_id']); // Prevent duplicate enrollments
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
