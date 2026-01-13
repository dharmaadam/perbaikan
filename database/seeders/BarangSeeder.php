<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'Laptop HP',
            'kode_barang' => 'LHP001',
            'kategori' => 'Elektronik',
            'lokasi' => 'Ruang IT',
        ]);

        Barang::create([
            'nama_barang' => 'Printer Canon',
            'kode_barang' => 'PCN001',
            'kategori' => 'Perangkat Kantor',
            'lokasi' => 'Ruang Admin',
        ]);

        Barang::create([
            'nama_barang' => 'Proyektor Epson',
            'kode_barang' => 'PEP001',
            'kategori' => 'Elektronik',
            'lokasi' => 'Ruang Meeting',
        ]);
    }
}
