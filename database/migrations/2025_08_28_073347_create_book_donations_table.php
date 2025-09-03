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
        Schema::create('book_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained('users')->onDelete('cascade');
            $table->string('donor_name');
            $table->string('donor_phone');
            $table->string('donor_email');
            $table->text('donor_address');
            $table->json('books_data'); // JSON data buku yang didonasikan
            $table->integer('total_books');
            $table->text('notes')->nullable();
            $table->enum('pickup_method', ['pickup', 'delivery'])->default('pickup');
            $table->text('pickup_address')->nullable();
            $table->date('preferred_date')->nullable();
            $table->time('preferred_time')->nullable();
            $table->enum('status', ['pending', 'approved', 'picked_up', 'completed', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('picked_up_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_donations');
    }
};
