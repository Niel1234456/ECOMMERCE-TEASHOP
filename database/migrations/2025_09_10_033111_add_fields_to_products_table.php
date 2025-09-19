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
    Schema::table('products', function (Blueprint $table) {
        $table->text('description')->nullable();
        $table->decimal('min_price', 8, 2)->nullable();
        $table->decimal('max_price', 8, 2)->nullable();
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['min_price', 'max_price']);
    });
}
};
