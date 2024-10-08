<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesepakatan extends Model
{
    use HasFactory;
    protected $fillable =[
        'bas_id',
        'atribut',
        'tipe_data',
        'created_at',
        'updated_at',
    ];
}
