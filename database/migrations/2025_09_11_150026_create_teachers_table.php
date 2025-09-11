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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique()->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('gender', ['L', 'P']);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_homeroom_teacher')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
