<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penyebab_serangan', function (Blueprint $table) {
            $table->enum('tipe', ['hama', 'penyakit'])->default('hama')->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyebab_serangan', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }
};
