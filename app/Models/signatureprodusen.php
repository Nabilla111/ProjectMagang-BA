<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureProdusen extends Model
{
    protected $table = 'signatureprodusens';
    use HasFactory;

    protected $fillable = [
        'bas_id',
        'nameprodusen',
        'nipprodusen',
        'hpprodusen',
        'signatureprod',
    ];

    // Definisikan hubungan antara SignatureProdusen dan Ba
    public function ba()
    {
        return $this->belongsTo(Ba::class, 'bas_id', 'id');
    }
}
