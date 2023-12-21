<?php

namespace App\Models;

use Database\Factories\CustomUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class CustomUser extends Authenticatable
{
    use Notifiable;
    use HasFactory;
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
    
    // CREATE
    public static function create(array $data)
    {
        $user = new CustomUser();
        $user->nom = $data['nom'];
        $user->prenom = $data['prenom'];
        $user->telephone = $data['telephone'];
        $user->email = $data['email'];
        $user->mot_de_passe = Hash::make($data['mot_de_passe']);
        $user->statut = $data['statut'];
        $user->save();
        return $user;
    }

    protected static function newFactory()
    {
        return new CustomUserFactory();
    } 
}
