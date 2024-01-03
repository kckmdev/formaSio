<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $fillable = [
        'date',
        'nb_places_restantes',
        'formation_id',
    ];

    // function to increase the number of available places in the session if a registration is deleted
    public function incrementAvailablePlaces()
    {
        // additional check to avoid incrementing the number of available places if it is already equal to the number of places in the session
        if ($this->nb_places_restantes == $this->formation->nb_places) {
            return;
        }
        $this->nb_places_restantes += 1;
        $this->save();
    }



    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
