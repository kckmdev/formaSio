<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Inscription;

    class InscriptionController extends Controller
    {
        public function create(FormationController $formation)
        {
            // Affiche le formulaire d'inscription avec les détails de la formation
            return view('inscription', compact('formation'));
        }

        public function store(FormationController $formation)
        {
            // Validez les données du formulaire et enregistrez l'inscription
            $data = request()->validate([
                'utilisateur_id' => 'required',
                'formation_id' => 'required',
            ]);
            // create a partir du model inscription
            $inscription = Inscription::createFromForm($data);  

            // Redirigez l'utilisateur vers une page de confirmation ou de succès
            return redirect()->route('inscription.confirmation');
        }

    }
