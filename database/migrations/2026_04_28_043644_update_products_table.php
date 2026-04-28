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
        $table->text('description')->nullable(); // field baru
        $table->enum('status', ['tersedia', 'habis'])->default('tersedia'); // field baru
        $table->bigInteger('price')->change(); // ubah tipe data
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['description', 'status']);
    });
    }
};
