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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade');
            $table->string('maintenance_type', 100);
            $table->date('maintenance_date');
            $table->text('description')->nullable();
            $table->decimal('cost', 15, 2)->default(0);
            $table->unsignedBigInteger('staff_in_charge_id')->nullable();
            $table->foreign('staff_in_charge_id')->references('id')->on('teachers')->onDelete('set null');
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
