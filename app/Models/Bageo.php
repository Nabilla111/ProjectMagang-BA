<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bageo extends Model
{
    use HasFactory;
    protected $table = 'bageos';
    protected $fillable = [
        'jenis_ba',
        'instansi',
        'tanggal_bageo',
        'tahun',
        'id_ttd',
    ];

    public function julda_geos()
    {
        return $this->hasMany(JuldaGeo::class, 'bageos_id');
    }

        public function informasikugis()
    {
        return $this->hasMany(InformasiKugi::class, 'bageos_id', 'id');
    }

    public function metadatageos()
    {
        return $this->hasMany(MetadataGeo::class, 'bageos_id');
    }

    public function penjaminankualitas()
    {
        return $this->hasMany(PenjaminanKualitas::class, 'bageos_id');
    }

    public function standardatageos()
    {
        return $this->hasMany(StandardataGeo::class, 'bageos_id', 'id');
    }

    public function ttdKabid()
{
    return $this->belongsTo(TtdKabid::class, 'id_ttd', 'id');
}
}


