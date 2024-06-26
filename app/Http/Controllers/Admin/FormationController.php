<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Intervenant;
use Faker\Factory;
use App\Models\Domaine;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;
use Carbon\Carbon;
use App\Models\Session; // Import the Session model class
use App\Models\Inscription; // Import the Inscription model class

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
        $formations = Formation::with('intervenant', 'domaine', 'sessions')->get();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // make pagination
        $formations = Formation::paginate($nb_lignes);
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

        $intervenants = Intervenant::all(['id', 'prenom', 'nom']);
        if ($intervenants->isEmpty()) {
            return redirect()
                ->route('intervenants.create')
                ->with('error', 'Vous devez créer au moins un intervenant avant de créer une formation.');
        }

        $domaines = Domaine::all(['id', 'libelle']);
        if ($domaines->isEmpty()) {
            return redirect()
                ->route('domaines.create')
                ->with('error', 'Vous devez créer au moins un domaine avant de créer une formation.');
        }

        // load the view
        return view('admin.formations.create', compact('placeholder', 'intervenants', 'domaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->intervenant);
        $data = $request->validate([
            'intitule' => 'required|string|max:255',
            'nb_places_max' => 'required|integer',
            'cout' => 'required|numeric',
            'duree' => 'required|date_format:H:i',
            'intervenant' => 'required|int',
            'domaine' => 'required|int',
        ]);

        // transform the duree into minutes
        $duree = explode(':', $data['duree']);
        $data['duree'] = $duree[0] * 60 + $duree[1];

        // attach the intervenant to the formation
        $intervenant = Intervenant::findorFail($data['intervenant']);
        $data['intervenant_id'] = $intervenant->id;

        // attach the domaine to the formation
        $domaine = Domaine::findorFail($data['domaine']);
        $data['domaine_id'] = $domaine->id;

        // Create a new formation with the validated data
        $formation = Formation::create($data);

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
    public function edit(Formation $formation)
    {
        $intervenants = Intervenant::all();
        $domaines = Domaine::all();

        return view('admin.formations.edit', compact('formation', 'intervenants', 'domaines'));
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
            'intervenant' => 'required',
            'domaine' => 'required',
            'cout' => 'required|numeric',
            'intitule' => 'required|string',
            'nb_places_max' => 'required|numeric',
        ]);

        $formation = Formation::find($id);
        $formation->cout = $request->get('cout');
        $formation->intitule = $request->get('intitule');
        $formation->nb_places_max = $request->get('nb_places_max');
        $formation->intervenant_id = $request->get('intervenant');
        $formation->domaine_id = $request->get('domaine');
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
        $formation = Formation::find($id);
        // delete all sessions related to the formation
        $formation->sessions()->delete();
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
        $originalFormation = Formation::findOrFail($id);

        // Créer une nouvelle instance de formation avec les mêmes données
        $newFormation = $originalFormation->replicate();

        // Sauvegarder la nouvelle formation
        $newFormation->save();

        // Rediriger vers la page d'index avec un message de succès
        return redirect()
            ->route('formations.index')
            ->with('success', 'Formation dupliquée avec succès.');
    }

    /**
     * Export the list of registered users for the formation as a PDF.
     *
     * @param int $id The ID of the formation.
     * @return \Illuminate\Http\Response
     */
    public function exportPdf($id)
    {

        $session = Session::findOrFail($id);
        $formation = $session->formation;
        $utilisateurs = $session->utilisateurs()->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('admin.formations.pdf', compact('formation', 'utilisateurs'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Download the PDF file
        return $pdf->stream('formation_utilisateurs.pdf');
    }

    public function downloadHistorique()
{
    // Vérifier si la demande est faite à la fin de l'année
    if (!now()->month == 12) {
        abort(403, 'L’historisation est disponible uniquement en fin d’année.');
    }

    // get registrations for the current year with the status 'approved'
    $inscriptions = Inscription::whereYear('created_at', now()->year)
        ->where('etat', 'valide')
        ->get();

    // generate the CSV content with a nice format and include data
    $csvContent = "Nom;Prénom;Email;Formation;Lieu de session;Date d'inscription\n";
    foreach ($inscriptions as $inscription) {
        $csvContent .= "{$inscription->utilisateur->nom};{$inscription->utilisateur->prenom};{$inscription->utilisateur->email};{$inscription->session->formation->intitule};{$inscription->session->lieu};{$inscription->created_at->format('d/m/Y H:i:s')}\n";
    }

    // Créer une réponse de téléchargement
    $filename = 'historique-participations-' . date('Y') . '.csv';
    return Response::make($csvContent, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename={$filename}",
    ]);
}
}
