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
        Schema::table('pemeriksaan_rutins', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')->after('id');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->string('kode_barang')->nullable()->after('nama_barang');
            $table->string('kategori')->nullable()->after('kode_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan_rutins', function (Blueprint $table) {
            $table->dropForeign(['barang_id']);
            $table->dropColumn(['barang_id', 'kode_barang', 'kategori']);
        });
    }
};
