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
        Schema::create('sponshorships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('nominal', 10, 2);
            $table->foreignId('investor_id')->constrained('investors')->cascadeOnDelete();
            $table->string('proposal');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponshorships');
    }
};
