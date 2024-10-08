<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtdKabid extends Model
{
    use HasFactory;
    protected $table = 'ttd_kabids';
    protected $fillable = [
        'nama',
        'jabatan',
        'nip',       
        'ttd',
    ];
}