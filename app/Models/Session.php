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


    public function formation()
    {
        return $this->belongsTo(Formations::class, 'formation_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
