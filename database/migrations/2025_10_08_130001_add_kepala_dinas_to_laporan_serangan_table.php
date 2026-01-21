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
        Schema::table('laporan_serangan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kepala_dinas')->nullable()->after('id_petani');
            $table->foreign('id_kepala_dinas')
                ->references('id_kepala_dinas')
                ->on('kepala_dinas')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_serangan', function (Blueprint $table) {
            $table->dropForeign(['id_kepala_dinas']);
            $table->dropColumn('id_kepala_dinas');
        });
    }
};
