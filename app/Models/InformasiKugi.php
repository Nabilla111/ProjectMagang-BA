<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKugi extends Model
{
    use HasFactory;
// Tambahkan properti $table untuk menggunakan nama tabel khusus
protected $table = 'informasikugis';  // Nama tabel sesuai dengan yang ada di database

    protected $fillable = [
        'bageos_id',
        'kode_unsur',
        'nama_unsur',
        'nama_alias',
        'fitur',
        'format_data',
        'SRSCRS',
        'skala',
        'atribut',
        'catatan',
        'saran',
    ];

    public function bageo()
{
    return $this->belongsTo(Bageo::class,'bageos_id');
}
}
