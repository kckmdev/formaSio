<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use Notifiable;
    //protected variables 
    protected $table = 'utilisateurs';
    protected $fillable = [
         'email', 'mot_de_passe' , 'statut',
    ];

    protected $hidden = [
        'mot_de_passe', 'remember_token', 'is_admin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //methode isUser with statut
    public function isUser()
    {
        return $this->statut === 'utilisateur';
    }

    //methode isAdmin with statut 
    public function isAdmin()
    {
        return $this->statut === 'admin';
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
