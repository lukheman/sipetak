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
        Schema::create('detail_laporan_serangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_laporan_serangan')->constrained('laporan_serangan')->cascadeOnDelete();
            $table->foreignId('id_penyebab_serangan')->constrained('penyebab_serangan')->cascadeOnDelete();
            $table->timestamps();
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
