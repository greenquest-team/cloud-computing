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
        Schema::create('waste_type_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_types_id')->constrained('waste_types')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('craft')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_type_details');
    }
};
