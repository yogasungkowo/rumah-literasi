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
        Schema::create('training_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['registered', 'approved', 'rejected', 'cancelled', 'completed'])->default('registered');
            $table->text('motivation')->nullable(); // Alasan mengikuti pelatihan
            $table->text('expectations')->nullable(); // Harapan dari pelatihan
            $table->text('experience_level')->nullable(); // Level pengalaman terkait topik
            $table->text('additional_info')->nullable(); // Informasi tambahan
            $table->json('attendance')->nullable(); // Record kehadiran per sesi
            $table->decimal('certificate_score', 5, 2)->nullable(); // Nilai untuk sertifikat
            $table->boolean('certificate_issued')->default(false);
            $table->timestamp('registered_at')->useCurrent();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            // Unique constraint to prevent duplicate registrations
            $table->unique(['training_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_participants');
    }
};
