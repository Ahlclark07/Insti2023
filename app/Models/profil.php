<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titre',
        'nom',
        'prenom',
        'photo',
        'filiere',
        'specialite',
        'date_de_naissance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
