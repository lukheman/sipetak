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
        Schema::create('penyebab_serangan_tanaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tanaman');
            $table->unsignedBigInteger('id_penyebab_serangan');
            $table->timestamps();

            $table->foreign('id_tanaman')
                ->references('id')
                ->on('tanaman')
                ->onDelete('cascade');

            $table->foreign('id_penyebab_serangan')
                ->references('id')
                ->on('penyebab_serangan')
                ->onDelete('cascade');

            // Prevent duplicate entries
            $table->unique(['id_tanaman', 'id_penyebab_serangan'], 'penyebab_serangan_tanaman_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyebab_serangan_tanaman');
    }
};
