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
            $table->unsignedBigInteger('id_admin')->nullable()->after('id');
            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admin')
                ->nullOnDelete();
        });

        Schema::table('tanaman', function (Blueprint $table) {
            $table->unsignedBigInteger('id_admin')->nullable()->after('id');
            $table->foreign('id_admin')
                ->references('id_admin')
                ->on('admin')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyebab_serangan', function (Blueprint $table) {
            $table->dropForeign(['id_admin']);
            $table->dropColumn('id_admin');
        });

        Schema::table('tanaman', function (Blueprint $table) {
            $table->dropForeign(['id_admin']);
            $table->dropColumn('id_admin');
        });
    }
};
