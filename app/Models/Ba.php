<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ba extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_ba',
        'instansi',
        'tanggal_ba',
        'tahun',
    ];
    
    public function dataJulda()
    {
        return $this->hasOne(Julda::class, 'bas_id', 'id');
    }

    public function signatureProdusens()
    {
        return $this->hasMany(SignatureProdusen::class, 'bas_id', 'id');
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class, 'bas_id', 'id');
    }

    public function julda()
    {
        return $this->hasMany(julda::class, 'bas_id', 'id');
    }

    public function juldabelum()
    {
        return $this->hasMany(juldabelum::class, 'bas_id', 'id');
    }
    public function kesepakatan()
{
    return $this->hasMany(Kesepakatan::class,'bas_id', 'id');
}

    
}