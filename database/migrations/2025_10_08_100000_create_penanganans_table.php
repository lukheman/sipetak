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
        Schema::create('rekomendasi_penanganan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penyuluh')->constrained('penyuluh', 'id_penyuluh')->cascadeOnDelete();
            $table->foreignId('id_laporan_serangan')->constrained('laporan_serangan')->cascadeOnDelete();
            $table->text('isi_penanganan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi_penanganan');
    }
};
