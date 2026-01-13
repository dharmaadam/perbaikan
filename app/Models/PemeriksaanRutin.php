<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanRutin extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_rutins';

    protected $fillable = [
        'barang_id',
        'nama_barang',
        'kode_barang',
        'kategori',
        'lokasi',
        'status',
        'software_status',
        'software_keterangan',
        'hardware_status',
        'hardware_keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
