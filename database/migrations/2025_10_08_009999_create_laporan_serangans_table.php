<?php

use App\Enums\StatusLaporan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_serangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tanaman')->constrained('tanaman')->cascadeOnDelete();
            $table->foreignId('id_petani')->constrained('petani', 'id_petani')->cascadeOnDelete();
            $table->date('tanggal_laporan');
            $table->text('deskripsi');
            $table->enum('status', StatusLaporan::values())->default(StatusLaporan::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_serangan');
    }
};
