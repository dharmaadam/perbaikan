<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel (opsional, kalau nama tabel sama dengan jamak dari model, Laravel auto-deteksi)
    protected $table = 'barangs';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori',
        'lokasi',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // Relasi ke pengajuan perbaikan
    public function pengajuanPerbaikans()
    {
        return $this->hasMany(PengajuanPerbaikan::class, 'barang_id');
    }
}
