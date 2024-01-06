<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theme_de_recherches extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom'
    ];
    public function enseignant()
    {
        return $this->belongsTo(User::class);
    }
}
