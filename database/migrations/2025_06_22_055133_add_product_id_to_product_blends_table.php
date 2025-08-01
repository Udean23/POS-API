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
        if (!Schema::hasColumn('product_blends', 'product_id')) {
            Schema::table('product_blends', function (Blueprint $table) {
                $table->foreignUuid('product_id')->nullable()->constrained();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('product_blends', 'product_id')) {
            Schema::table('product_blends', function (Blueprint $table) {
                $table->dropColumn('product_id');
            });
        }
    }
};
