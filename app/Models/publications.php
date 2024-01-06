<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'noms',
        'annee',
        'titre_revue',
        'document_de_parution',
        'numero'
    ];
    public function enseignant()
    {
        return $this->belongsTo(user::class);
    }
}
