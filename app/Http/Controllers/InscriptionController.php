<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formations;
use App\Models\Domaine;

class InscriptionController extends Controller
{
    //afficher le formulaire d'inscription

    public function show(Request $request)
    {
        $url = $request->fullUrl();
        $query = parse_url($url, PHP_URL_QUERY);
        $id = $query;
        $formation = Formations::find($id);
        return view('inscription', ['formation' => $formation], ['domaines' => Domaine::all()]);
    }

    public function verifierInscriptions(Request $request)
    {

        $user = $request->user(); // récupérer l'utilisateur connecté

        $inscriptions = $user->inscriptions; // récupérer les inscriptions de l'utilisateur

    }

    //create inscription
    public function create(Request $request)
    {
        //check if user is already inscribed
        $inscription = Inscription::where('utilisateur_id', auth()->user()->id)->where('session_id', $request->input('session'))->first();
        if ($inscription) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cette formation');
        }
        //check if user has more than 3 inscriptions the same year
        $anneeCourante = date('Y');

        $inscriptions = Inscription::where('utilisateur_id', auth()->user()->id)
            ->whereYear('created_at', $anneeCourante)
            ->get();

        if (count($inscriptions) >= 3) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas vous inscrire à plus de 3 formations par an');
        }

        $inscription = new Inscription();
        $inscription->date_inscription = now();
        $inscription->etat_paiement = 'en_cours';
        $inscription->session_id = $request->input('session');
        $inscription->utilisateur_id = auth()->user()->id;
        $inscription->save();

        return redirect()->route('profil');
    }
}
