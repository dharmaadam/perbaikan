<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan_perbaikans', function (Blueprint $table) {
            // jangan buat barang_id lagi, sudah ada di migration create_pengajuan_perbaikans_table
            if (!Schema::hasColumn('pengajuan_perbaikans', 'nama_pengaju')) {
                $table->string('nama_pengaju', 100);
            }
            if (!Schema::hasColumn('pengajuan_perbaikans', 'deskripsi_kerusakan')) {
                $table->text('deskripsi_kerusakan');
            }
            if (!Schema::hasColumn('pengajuan_perbaikans', 'status')) {
                $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_perbaikans', function (Blueprint $table) {
            if (Schema::hasColumn('pengajuan_perbaikans', 'nama_pengaju')) {
                $table->dropColumn('nama_pengaju');
            }
            if (Schema::hasColumn('pengajuan_perbaikans', 'deskripsi_kerusakan')) {
                $table->dropColumn('deskripsi_kerusakan');
            }
            if (Schema::hasColumn('pengajuan_perbaikans', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
