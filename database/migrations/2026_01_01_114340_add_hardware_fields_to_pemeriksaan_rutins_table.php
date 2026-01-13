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
            $table->enum('hardware_status', ['Bagus', 'Tidak'])->nullable()->after('software_keterangan');
            $table->text('hardware_keterangan')->nullable()->after('hardware_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan_rutins', function (Blueprint $table) {
            $table->dropColumn(['hardware_status', 'hardware_keterangan']);
        });
    }
};
