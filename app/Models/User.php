<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\RoleController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\profil;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function roles()
    {
        return RoleController::getRole($this);
    }

    public function profil()
    {
        return $this->hasOne(profil::class);
    }

    public function reseaux()
    {
        return $this->hasMany(reseau::class);
    }

    public function theme_de_recherche()
    {
        return $this->hasOne(theme_de_recherches::class);
    }

    public function grades()
    {
        return $this->hasMany(grade::class);
    }

    public function distinctions()
    {
        return $this->hasMany(distinctions::class);
    }

    public function ues()
    {
        return $this->hasMany(ue::class);
    }

    public function projets_recherche()
    {
        return $this->hasMany(projets_recherche::class);
    }

    public function publications()
    {
        return $this->hasMany(publications::class);
    }
}
