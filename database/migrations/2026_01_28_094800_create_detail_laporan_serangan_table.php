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
        Schema::create('detail_laporan_serangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_laporan_serangan');
            $table->unsignedBigInteger('id_penyebab_serangan');
            $table->timestamps();

            $table->foreign('id_laporan_serangan')
                ->references('id')
                ->on('laporan_serangan')
                ->onDelete('cascade');

            $table->foreign('id_penyebab_serangan')
                ->references('id')
                ->on('penyebab_serangan')
                ->onDelete('cascade');

            // Prevent duplicate entries
            $table->unique(['id_laporan_serangan', 'id_penyebab_serangan'], 'detail_laporan_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan_serangan');
    }
};
