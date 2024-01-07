<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use Faker\Factory;
use App\Models\Formation;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupérer toutes les sessions
        $sessions = Session::with('formation')->get();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // Paginer les sessions
        $sessions = Session::paginate($nb_lignes);

        // Charger la vue et transmettre les sessions
        return view('admin.sessions.index', compact('sessions', 'nb_lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $formations = Formation::all();

   
        if ($formations->isEmpty()) {
            return redirect()->route('formations.create')->with('error', 'No formations available. Please create a formation first.');
        }


        $placeholder = (object) [
            'date' => Factory::create()->dateTimeBetween('now', '+1 year'),
        ];


        return view('admin.sessions.create', compact('placeholder', 'formations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session();
        $session->date = $request->input('date');
        // Ajoutez d'autres propriétés comme nécessaire
        $session->save();

        return redirect()->route('sessions.index')->with('success', 'Session created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);
        return view('admin.sessions.edit', compact('session'));
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
        $session = Session::find($id);
        $session->date = $request->input('date');
        // Mettez à jour d'autres propriétés au besoin
        $session->save();

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully');
    }
}
