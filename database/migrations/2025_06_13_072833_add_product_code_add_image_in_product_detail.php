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
        if (!Schema::hasColumn('product_details', 'product_code')) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->string('product_code')->nullable();
            });
        }
        if (!Schema::hasColumn('product_details', 'product_image')) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->string('product_image')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('product_details', 'product_code')) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->dropColumn('product_code');
            });
        }
        if (Schema::hasColumn('product_details', 'product_image')) {
            Schema::table('product_details', function (Blueprint $table) {
                $table->dropColumn('product_image');
            });
        }
    }
};
