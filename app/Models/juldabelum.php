<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class juldabelum extends Model
{
    use HasFactory;
    protected $fillable =[
        'bas_id',
        'juduldata_belum',
        'julket_belum',
        'created_at',
        'updated_at',
    ];
}