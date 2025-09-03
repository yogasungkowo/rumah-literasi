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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('avatar')->nullable()->after('phone');
            $table->text('address')->nullable()->after('avatar');
            $table->string('organization')->nullable()->after('address');
            $table->string('profession')->nullable()->after('organization');
            $table->text('bio')->nullable()->after('profession');
            $table->date('birth_date')->nullable()->after('bio');
            $table->enum('gender', ['male', 'female'])->nullable()->after('birth_date');
            $table->string('status')->default('active')->after('gender');
            $table->timestamp('last_login_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'avatar', 'address', 'organization', 
                'profession', 'bio', 'birth_date', 'gender', 
                'status', 'last_login_at'
            ]);
        });
    }
};
