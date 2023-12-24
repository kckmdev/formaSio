<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formations;
use Illuminate\Support\Facades\Response;

class FormationController extends Controller
{
    //controller 
    public function index()
    {
        $formations = Formations::with(['domaine', 'sessions'])->get();
        $groupedFormations = $formations->groupBy('domaine.libelle');

        return view('formations', ['groupedFormations' => $groupedFormations]);
    }

    public function telechargerPdf()
    {
        $cheminVersPDF = public_path('\Doc_Inscription.pdf');

        return Response::download($cheminVersPDF, 'Doc_Inscription.pdf');
    }

}
