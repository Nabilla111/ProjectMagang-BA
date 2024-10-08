<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuldaGeo extends Model
{
    use HasFactory;
    protected $fillable =[
        'bageos_id',
        'judul_data',
        'waktu_unggah',
        'duplikasi',
        'jenis_data',
        'periode',
        'catatan',
    ];

    public function bageo()
{
    return $this->belongsTo(Bageo::class,'bageos_id');
}

    
}
