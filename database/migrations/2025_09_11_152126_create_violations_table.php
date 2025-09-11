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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->integer('points');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('reporter_teacher_id')->nullable();
            $table->foreign('reporter_teacher_id')->references('id')->on('teachers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
