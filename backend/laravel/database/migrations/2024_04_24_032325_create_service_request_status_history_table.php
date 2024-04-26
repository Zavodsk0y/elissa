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
        Schema::create('service_request_status_history', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('previous_status')->nullable();
            $table->string('new_status')->nullable();
            $table->integer('changed_by_user_id')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_request_status_history');
    }
};
