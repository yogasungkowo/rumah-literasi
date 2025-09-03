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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('isbn')->nullable();
            $table->text('description')->nullable();
            $table->string('category');
            $table->string('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->integer('pages')->nullable();
            $table->string('language')->default('id');
            $table->string('cover_image')->nullable();
            $table->enum('condition', ['new', 'good', 'fair', 'poor'])->default('good');
            $table->enum('status', ['available', 'borrowed', 'donated', 'damaged'])->default('available');
            $table->foreignId('donated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('donated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
