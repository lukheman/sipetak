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
        Schema::create('penyuluh', function (Blueprint $table) {
            $table->id('id_penyuluh');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telepon');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->cascadeOnDelete();
            $table->string('photo')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyuluh');
    }
};
