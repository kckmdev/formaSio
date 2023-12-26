<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use App\Models\Inscription;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //return view profil
    public function show()
    {
        $utilisateur = auth()->user();
        $inscriptions = Inscription::with(['formation', 'session'])
            ->where('utilisateur_id', auth()->user()->id)
            ->get();

        return view('profil', ['utilisateur' => $utilisateur , 'inscriptions' => $inscriptions]);
    }
}
