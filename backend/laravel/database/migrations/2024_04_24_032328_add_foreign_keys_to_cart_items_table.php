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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign(['part_id'], 'cart_items_part_id_fkey')->references(['id'])->on('repair_parts')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'cart_items_user_id_fkey')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign('cart_items_part_id_fkey');
            $table->dropForeign('cart_items_user_id_fkey');
        });
    }
};
