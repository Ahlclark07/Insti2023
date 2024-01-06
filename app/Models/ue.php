<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_ue',
        'niveau_etude',
        'description'
    ];

    public function enseignants()
    {
        return $this->hasMany(User::class);
    }
}
