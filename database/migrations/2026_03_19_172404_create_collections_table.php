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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., 'Overseas Self-Catering'
            $table->string('image_path'); // e.g., 'images/collections/overseas.jpg'
            $table->string('url')->nullable(); // The link the card points to
            $table->integer('order')->default(0); // For manual sorting in Filament
            $table->boolean('is_active')->default(true); // To h
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
