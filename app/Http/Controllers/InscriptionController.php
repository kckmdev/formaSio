<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formations;
use App\Models\Domaine;

class InscriptionController extends Controller
{
    //show inscription form
    public function show(Request $request)
    {
        $url = $request->fullUrl();
        $query = parse_url($url, PHP_URL_QUERY);
        $id = $query;
        $formation = Formations::find($id);
        return view('inscription', ['formation' => $formation], ['domaines' => Domaine::all()]);
    }


    //create inscription
    public function create(Request $request)
    {
        //check if user is already registered to this session
        $inscription = Inscription::where('utilisateur_id', auth()->user()->id)->where('session_id', $request->input('session'))->first();
        if ($inscription) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cette formation');
        }
        //check if user has more than 3 registrations in the same year 
        $anneeCourante = date('Y');

        $inscriptions = Inscription::where('utilisateur_id', auth()->user()->id)
            ->whereYear('created_at', $anneeCourante)
            ->get();

        if (count($inscriptions) >= 3) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas vous inscrire à plus de 3 formations par an');
        }
        //check if user has more than 2 registrations in the same domain
        $session = $request->input('session');
        $formation = Formations::find($session);
        $domaine = $formation->domaine;
        $domaine_id = $domaine->id;

        if ($domaine_id) {
            $count = Inscription::where('utilisateur_id', auth()->user()->id)
                ->whereHas('session.formation', function ($query) use ($domaine_id) {
                    $query->where('domaine_id', $domaine_id);
                })
                ->whereYear('created_at', $anneeCourante) 
                ->count();

            
            if ($count >= 2) {
                return redirect()->back()->with('error', 'Vous ne pouvez pas vous inscrire à plus de 2 formations dans le même domaine pour l\'année courante');
            }
        }

        //check if registrations are open
        $mois = date('m');
        $jour = date('d');

        if ($mois < 9 || ($mois == 9 && $jour < 1)) {
            return redirect()->back()->with('error', 'Les inscriptions ne sont pas encore ouvertes');
        }


        //if all checks are ok, create the registration
        $inscription = new Inscription();
        $inscription->date_inscription = now();
        $inscription->etat_paiement = 'en_cours';
        $inscription->session_id = $request->input('session');
        $inscription->utilisateur_id = auth()->user()->id;
        $inscription->save();

        return redirect()->route('profil');
    }
}
