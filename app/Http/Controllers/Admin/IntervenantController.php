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
    public function index()
    {
        //
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
        return redirect()->route('intervenants.index')->with('success', 'Intervenant créé avec succès.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
