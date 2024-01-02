<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formations;
use Faker\Factory;
use App\Models\Intervenants;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get all formations and join intervenants, domaines and sessions
        $formations = Formations::with('sessions')->get();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // make pagination
        $formations = Formations::paginate($nb_lignes);
        // load the view and pass the formations

        return view('admin.formations.index', compact('formations', 'nb_lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //placeholder for the form
        $minutes = ['00', '15', '30', '45'];
        $randomMinute = $minutes[array_rand($minutes)];

        $duree = str_pad(Factory::create()->numberBetween($min = 1, $max = 4), 2, '0', STR_PAD_LEFT) . ':' . $randomMinute;
        $placeholder = (object) [
            'intitule' => Factory::create()->sentence($nbWords = 3, $variableNbWords = true),
            'nb_places_max' => Factory::create()->numberBetween($min = 1, $max = 100),
            'cout' => Factory::create()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),

            'duree' => $duree,
        ];

        // check if exists a lest one intervenant
        // ...

        $intervenants = Intervena::count();
        if ($intervenants == 0) {
            return redirect()
                ->route('intervenants.create')
                ->with('error', 'Vous devez créer au moins un intervenant avant de créer une formation.');
        }

        // load the view
        return view('admin.formations.create', compact('placeholder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'intitule' => 'required|string|max:255',
            'nb_places_max' => 'required|integer',
            'cout' => 'required|numeric',
            'duree' => 'required|date_format:H:i',
        ]);

        // transform the duree into minutes
        $duree = explode(':', $data['duree']);
        $data['duree'] = $duree[0] * 60 + $duree[1];
        

        // Create a new formation with the validated data
        $formation = Formations::create($data);

        // check if the formation was created
        if (!$formation) {
            return redirect()
                ->route('formations.create')
                ->with('error', 'Une erreur est survenue lors de la création de la formation.');
        }

        // Redirect to the formations index page
        return redirect()->route('formations.index')
            ->with('success', 'La formation a bien été créée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formations::findOrFail($id);
        return view('admin.formations.edit', compact('formation'));
    }

    /**
     * Update the specified formation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cout' => 'required|numeric',
            'intitule' => 'required|string',
            'nb_places_max' => 'required|numeric',
        ]);

        $formation = Formations::find($id);
        $formation->cout = $request->get('cout');
        $formation->intitule = $request->get('intitule');
        $formation->nb_places_max = $request->get('nb_places_max');
        $formation->save();

        return redirect()
            ->route('formations.index')
            ->with('success', 'La formation a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formations::find($id);
        $formation->delete();

        return redirect()
            ->route('formations.index')
            ->with('success', 'La formation a bien été supprimée');
    }

    /**
     * Duplicate a formation.
     *
     * @param int $id The ID of the formation to duplicate.
     * @return \Illuminate\Http\Response
     */
    public function duplicate($id)
    {
        // Récupérer la formation à dupliquer
        $originalFormation = Formations::findOrFail($id);

        // Créer une nouvelle instance de formation avec les mêmes données
        $newFormation = $originalFormation->replicate();

        // Sauvegarder la nouvelle formation
        $newFormation->save();

        // Rediriger vers la page d'index avec un message de succès
        return redirect()
            ->route('formations.index')
            ->with('success', 'Formation dupliquée avec succès.');
    }
}

?>
