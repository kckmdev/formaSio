<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intervenant;
use Illuminate\Http\Request;
use Faker\Factory;
use Faker\Generator;

class IntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        // get all intervenants
        $intervenants = Intervenant::all();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // make pagination
        $intervenants = Intervenant::paginate($nb_lignes);
        // load the view and pass the intervenants

        return view('admin.intervenants.index', compact('intervenants', 'nb_lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //placeholder for the form (faker)
        $faker = Factory::create('fr_FR');
        $placeholder = (object) [
            'prenom' => $faker->firstName(),
            'nom' => $faker->lastName(),
            'email' => $faker->email(),
            'telephone' => $faker->phoneNumber(),
        ];
        return view('admin.intervenants.create', compact('placeholder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
        ]);

        // Create a new intervenant instance
        $intervenant = new Intervenant();
        $intervenant->prenom = $validatedData['prenom'];
        $intervenant->nom = $validatedData['nom'];
        $intervenant->email = $validatedData['email'];
        $intervenant->telephone = $validatedData['telephone'];

        // Save the intervenant
        $intervenant->save();

        // Redirect to the index page with a success message
        return redirect()
            ->route('intervenants.index')
            ->with('success', 'Intervenant créé avec succès.');
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
        $intervenant = Intervenant::findOrFail($id);
        return view('admin.intervenants.edit', compact('intervenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
        ]);

        // Find the intervenant by id
        $intervenant = Intervenant::findOrFail($id);

        // Update the intervenant
        $intervenant->prenom = $validatedData['prenom'];
        $intervenant->nom = $validatedData['nom'];
        $intervenant->email = $validatedData['email'];
        $intervenant->telephone = $validatedData['telephone'];

        // Save the intervenant
        $intervenant->save();

        // Redirect to the index page with a success message
        return redirect()
            ->route('intervenants.index')
            ->with('success', 'Intervenant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the intervenant by id
        $intervenant = Intervenant::findOrFail($id);

        // Delete the intervenant
        $intervenant->delete();

        // Redirect to the index page with a success message
        return redirect()
            ->route('intervenants.index')
            ->with('success', 'Intervenant supprimé avec succès.');
    }
}
