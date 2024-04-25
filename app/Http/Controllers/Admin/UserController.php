<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomUser;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Récupérer tous les utilisateurs
        $users = CustomUser::all();

        $validatedData = $request->validate([
            'nb_lignes' => 'numeric|min:1',
        ]);

        $nb_lignes = $validatedData['nb_lignes'] ?? 5;

        // Pagination
        $utilisateurs = CustomUser::paginate($nb_lignes);

        // Replace "utilisateur" status with "bénévole/salarié"
        $utilisateurs->transform(function ($user) {
            $user->statut = ($user->statut === 'utilisateur') ? 'bénévole/salarié' : $user->statut;
            return $user;
        });

        // Charger la vue et passer les utilisateurs
        return view('admin.utilisateurs.index', compact('utilisateurs', 'nb_lignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $faker = Faker::create('fr_FR');

        $placeholder = (object)[
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'telephone' => $faker->phoneNumber,
            'mot_de_passe' => $faker->password,
            'statut' => $faker->randomElement(['bénévole', 'salarié', 'admin']),
        ];

        // Charger la vue de création d'utilisateur avec les valeurs aléatoires
        return view('admin.utilisateurs.create', compact('placeholder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8',
            'statut' => 'required|in:bénévole,salarié,admin',
        ]);

        // Créer un nouvel utilisateur avec les données validées

        $user = CustomUser::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'mot_de_passe' => $data['mot_de_passe'],
            'statut' => ($data['statut'] === 'admin') ? 'admin' : 'utilisateur',
        ]);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'L\'utilisateur a bien été créé.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Récupérer l'utilisateur à éditer
        $utilisateur = CustomUser::findOrFail($id);

        // Charger la vue d'édition avec les données de l'utilisateur
        return view('admin.utilisateurs.edit', compact('utilisateur'));
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
        // Valider les données du formulaire
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $id, // Ignore l'email de l'utilisateur actuel
            'statut' => 'required|in:bénévole,salarié,admin',
            'mot_de_passe' => 'nullable|string|min:8',
        ]);

        // Récupérer l'utilisateur à mettre à jour
        $user = CustomUser::findOrFail($id);

        // Mettre à jour les données de l'utilisateur
        $user->nom = $data['nom'];
        $user->prenom = $data['prenom'];
        $user->telephone = $data['telephone'];
        $user->email = $data['email'];
        if ($data['statut'] === 'bénévole' || $data['statut'] === 'salarié') {
            $user->statut = 'utilisateur';
        } elseif ($data['statut'] === 'admin') {
            $user->statut = 'admin';
        }
        if ($data['mot_de_passe']) {
            $user->mot_de_passe = Hash::make($data['mot_de_passe']);
        }

        // Sauvegarder les modifications
        $user->save();

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'L\'utilisateur a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Récupérer l'utilisateur à supprimer
        $user = CustomUser::findOrFail($id);

        // Supprimer l'utilisateur
        $user->delete();

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'L\'utilisateur a bien été supprimé.');
    }
}
