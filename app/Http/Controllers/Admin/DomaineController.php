<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domaine;
use Faker\Factory;

class DomaineController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        // get all domaines
        $domaines = Domaine::all();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // make pagination
        $domaines = Domaine::paginate($nb_lignes);
        // load the view and pass the domaines

        return view('admin.domaines.index', compact('domaines', 'nb_lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $placeholder = (object) [
            'libelle' => Factory::create()->sentence($nbWords = 2, $variableNbWords = true),
            
        ];
        return view('admin.domaines.create', compact('placeholder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $domaine = new Domaine();
        $domaine->libelle = $request->input('libelle');
        // Set other properties as needed
        $domaine->save();

        return redirect()->route('domaines.index')->with('success', 'Domaine created successfully');
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
        $domaine = Domaine::find($id);
        return view('admin.domaines.edit', compact('domaine'));
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
        $domaine = Domaine::find($id);
        $domaine->libelle = $request->input('libelle');
        // Update other properties as needed
        $domaine->save();

        return redirect()->route('domaines.index')->with('success', 'Domaine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domaine = Domaine::find($id);
        $domaine->delete();

        return redirect()->route('domaines.index')->with('success', 'Domaine deleted successfully');
    }
}
