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
        Schema::table('repair_parts', function (Blueprint $table) {
            $table->foreign(['category_id'], 'repair_parts_category_id_fkey')->references(['id'])->on('parts_categories')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repair_parts', function (Blueprint $table) {
            $table->dropForeign('repair_parts_category_id_fkey');
        });
    }
};
