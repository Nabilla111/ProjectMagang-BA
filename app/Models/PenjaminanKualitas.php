<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjaminanKualitas extends Model
{
    use HasFactory;

    protected $table = 'penjaminankualitas';  // Nama tabel sesuai dengan yang ada di database

    protected $fillable = [
        'bageos_id',
        'kelengkapan_dataset',
        'konsistensi_logis',
        'akurasi_posisi',
        'akurasi_tematik',
        'akurasi_temporal',
    ];

    public function bageo()
    {
        return $this->belongsTo(Bageo::class, 'bageos_id');
    }
}
