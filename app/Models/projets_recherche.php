<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projets_recherche extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'designations',
        'implication',
        'niveau_avancement',
        'objectifs'
    ];

    public function enseignant()
    {
        return $this->belongsTo(user::class);
    }
}
