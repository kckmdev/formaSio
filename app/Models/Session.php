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

    // function to increase the number of available places in the session if a registration is deleted
    public function incrementAvailablePlaces()
    {
        $this->nb_places_restantes += 1;
        $this->save();
    }



    public function formation()
    {
        return $this->belongsTo(Formations::class, 'formation_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
