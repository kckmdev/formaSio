<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Formations extends Model
{
    use HasFactory;

    // Si votre table ne suit pas la convention de nommage standard de Laravel
    // vous pouvez spécifier le nom de la table avec la propriété protected $table
    protected $table = 'formations';

    // Si votre clé primaire n'est pas 'id', vous pouvez la définir ici
    protected $primaryKey = 'id';

    public $timestamps = true;

    // Si vous voulez permettre l'assignation en masse pour certains champs
    protected $fillable = [
        'intitule',
        'duree',
        'nb_places_max',
        'cout',
        'intervenant_id',
        'domaine_id',
    ];
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class); // Laravel utilisera automatiquement 'formation_id' comme clé étrangère
    }
    
    // Exemple d'un accesseur pour formater le coût
    public function getCoutFormattedAttribute()
    {
        return number_format($this->cout, 2, ',', ' ') . ' €';
    }

}
