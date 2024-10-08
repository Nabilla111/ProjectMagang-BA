<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 
        'name', 
        'nip', 
        'hp', 
        'signature'
    ];
    
    // Definisikan hubungan antara Signature dan User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
