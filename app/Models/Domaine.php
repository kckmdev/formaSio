<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    protected $table = 'domaines';

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function getAllDomaines()
    {
        $domaines = Domaine::all();
        return $domaines;
    }
    
    
}
