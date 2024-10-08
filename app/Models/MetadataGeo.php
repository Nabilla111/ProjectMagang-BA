<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetadataGeo extends Model
{
    use HasFactory;
    // Tambahkan properti $table untuk menggunakan nama tabel khusus
    protected $table = 'metadatageos';  // Nama tabel sesuai dengan yang ada di database

    protected $fillable = [
        'bageos_id',
        'nama',
        'format_data',
        'catatan',
        'saran',
    ];

    public function bageo()
{
    return $this->belongsTo(Bageo::class,'bageos_id');
}
}
