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
        Schema::table('service_request_status_history', function (Blueprint $table) {
            $table->foreign(['changed_by_user_id'], 'service_request_status_history_changed_by_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['request_id'], 'service_request_status_history_request_id_fkey')->references(['id'])->on('requests')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_request_status_history', function (Blueprint $table) {
            $table->dropForeign('service_request_status_history_changed_by_user_id_fkey');
            $table->dropForeign('service_request_status_history_request_id_fkey');
        });
    }
};
