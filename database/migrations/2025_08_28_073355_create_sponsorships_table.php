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
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sponsor_id')->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->text('company_address');
            $table->string('website')->nullable();
            $table->enum('sponsorship_type', ['event', 'program', 'facility', 'general'])->default('general');
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('IDR');
            $table->text('description');
            $table->json('benefits_requested')->nullable(); // Benefit yang diinginkan sponsor
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('proposal_file')->nullable(); // File proposal
            $table->string('company_profile')->nullable(); // File company profile
            $table->enum('status', ['pending', 'approved', 'active', 'completed', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorships');
    }
};
