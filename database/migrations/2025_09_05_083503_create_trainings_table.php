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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('instructor_name');
            $table->string('instructor_email')->nullable();
            $table->string('instructor_phone')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->integer('max_participants');
            $table->integer('current_participants')->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('status', ['draft', 'published', 'ongoing', 'completed', 'cancelled'])->default('draft');
            $table->text('requirements')->nullable();
            $table->text('materials')->nullable();
            $table->string('certificate_template')->nullable();
            $table->string('image')->nullable();
            $table->json('schedule')->nullable(); // For detailed daily schedule
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
