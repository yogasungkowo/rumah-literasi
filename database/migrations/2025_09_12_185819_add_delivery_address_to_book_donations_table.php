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
        Schema::table('book_donations', function (Blueprint $table) {
            $table->text('delivery_address')->nullable()->after('pickup_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_donations', function (Blueprint $table) {
            $table->dropColumn('delivery_address');
        });
    }
};
