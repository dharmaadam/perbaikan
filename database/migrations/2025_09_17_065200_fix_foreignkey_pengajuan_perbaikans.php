<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan_perbaikans', function (Blueprint $table) {
            // Hapus foreign key lama kalau ada
            $table->dropForeign(['barang_id']);

            // Pastikan kolom barang_id tipenya benar (bigint unsigned)
            $table->unsignedBigInteger('barang_id')->change();

            // Tambahkan foreign key yang benar
            $table->foreign('barang_id')
                  ->references('id')
                  ->on('barangs')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_perbaikans', function (Blueprint $table) {
             // FK sudah tidak ada, jadi tidak usah drop lagi
            //$table->dropForeign(['barang_id']);
        });
    }
};
