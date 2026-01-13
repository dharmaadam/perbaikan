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
            $table->enum('software_status', ['Bagus', 'Tidak'])->nullable()->after('status');
            $table->text('software_keterangan')->nullable()->after('software_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaan_rutins', function (Blueprint $table) {
            $table->dropColumn(['software_status', 'software_keterangan']);
        });
    }
};
