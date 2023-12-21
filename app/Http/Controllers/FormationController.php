<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formations;

class FormationController extends Controller
{
    //controller 
    public function index()
    {
        $formations = Formations::with(['domaine', 'sessions'])->get();
        $groupedFormations = $formations->groupBy('domaine.libelle');

        return view('formations', ['groupedFormations' => $groupedFormations]);
    }

    public function show($formationId)
{
    // Récupérez la formation en fonction de $formationId depuis la base de données
    $formation = Formations::findOrFail($formationId);

    // Passez la formation à la vue
    return view('inscription', ['formation' => $formation]);
}
}
