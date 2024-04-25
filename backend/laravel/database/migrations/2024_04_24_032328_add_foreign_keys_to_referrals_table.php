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
        Schema::table('referrals', function (Blueprint $table) {
            $table->foreign(['referred_user_id'], 'referrals_referred_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['referring_user_id'], 'referrals_referring_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropForeign('referrals_referred_user_id_fkey');
            $table->dropForeign('referrals_referring_user_id_fkey');
        });
    }
};
