<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $fillable = [
        'utilisateur_id',
        'formation_id',
    ];

    //if a registration is deleted, increase the number of available places in the session dynamically
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($inscription) {
            if ($inscription->session) {
                $inscription->session->incrementAvailablePlaces();
            }
        });
    }


    //relation avec utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(CustomUser::class, 'utilisateur_id');
    }

    //relation avec formation
    public function formation()
    {
        return $this->belongsTo(Formations::class, 'formation_id');
    }
    public function session()
    {
        return $this->belongsTo(Session::class); // Assurez-vous que Session est le nom correct du modèle
    }

    //methode pour créer une inscription à partir des données du formulaire
    public static function createFromForm($data)
    {
        $inscription = new self();
        $inscription->utilisateur_id = $data['utilisateur_id'];
        $inscription->formation_id = $data['formation_id'];
        $inscription->save();
        return $inscription;
    }
}
