<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formations;

class InscriptionController extends Controller
{
    //afficher le formulaire d'inscription

    public function show(Request $request)
    {
        $url = $request->fullUrl();
        $query = parse_url($url, PHP_URL_QUERY); 
        $id = $query;
        $formation = Formations::find($id);
        return view('inscription', ['formation' => $formation]);
    }

    //create inscription
    public function create(Request $request)
    {
    
        $inscription = new Inscription();
        $inscription->date_inscription = now(); 
        $inscription->etat_paiement = 'en_cours'; 
        $inscription->session_id = $request->input('session'); 
        $inscription->utilisateur_id = auth()->user()->id; 
        $inscription->save();
    
        return redirect()->route('profil');
    }
    



}
