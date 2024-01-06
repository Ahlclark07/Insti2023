<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distinctions extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee',
        'nom_distinction',
        'institut',
        'lieu'
    ];
    public function enseignant()
    {
        return $this->belongsTo(User::class);
    }
}
