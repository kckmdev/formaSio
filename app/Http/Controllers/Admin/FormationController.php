<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formations;

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
        $formations = Formations::with("sessions")->get();
        
        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1'
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // make pagination
        $formations = Formations::paginate($nb_lignes);
        // load the view and pass the formations

        return view("admin.formations.index", compact("formations", "nb_lignes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // load the view
        return ("admin.formations.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view("admin.formations.edit", compact("formation"));
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
        ]);

        $formation = Formations::find($id);
        $formation->cout = $request->get('cout');
        $formation->save();

        return redirect()->route('formations.index')
                         ->with('success','La formation a bien été modifiée');
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

        return redirect()->route('formations.index')
                         ->with('success','La formation a bien été supprimée');
    }

}

?>
