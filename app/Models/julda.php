<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class julda extends Model
{
    use HasFactory;
    protected $fillable =[
        'bas_id',
        'judul_data',
        'julket',
        'created_at',
        'updated_at',
    ];
}