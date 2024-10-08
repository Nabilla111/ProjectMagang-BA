<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardataGeo extends Model
{
    use HasFactory;
    // Tambahkan properti $table untuk menggunakan nama tabel khusus
    protected $table = 'standardatageos';  // Nama tabel sesuai dengan yang ada di database

    protected $fillable = [
        'bageos_id',
        'bentuk',
        'nomor',
        'tanggal',
        'konsep',
        'definisi',
        'klasifikasi',
        'ukuran',
        'satuan',
    ];
    
    public function bageo()
    {
        return $this->belongsTo(Bageo::class,'bageos_id');
    }

}
