<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanPerbaikan extends Model
{
    use SoftDeletes;

    // 👇 pastikan Laravel pakai tabel yang benar
    protected $table = 'pengajuan_perbaikans';

    protected $fillable = [
        'user_id',
        'barang_id',
        'nama_pengaju',
        'deskripsi_kerusakan',
        'technician_id',
        'status',
        'departemen',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
