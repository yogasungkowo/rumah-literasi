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
        Schema::table('investors', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            $table->string('image_profile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investors', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->string('image_profile')->nullable(false)->change();
        });
    }
};
