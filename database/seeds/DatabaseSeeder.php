<?php

use App\Models\CustomUser;
use App\Models\Domaine;
use App\Models\Formation;
use App\Models\Inscription;
use App\Models\Intervenant;
use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ajouter d'un utilisateur par role
        CustomUser::create([
            'nom' => 'Martin',
            'prenom' => 'Alice',
            'telephone' => '0606060606',
            'email' => 'utilisateur@gmail.com',
            'mot_de_passe' => 'password', 
            'statut' => 'utilisateur',
        ]);

        // Ajouter un utilisateur spécifique (admin)
        CustomUser::create([
            'nom' => 'Jean',
            'prenom' => 'Dupont',
            'telephone' => '0606060606',
            'email' => 'admin@gmail.com',
            'mot_de_passe' => 'password',
            'statut' => 'admin',
        ]);
        //création de 10 utilisateurs
        CustomUser::factory(10)->create([
            'mot_de_passe' => Hash::make('password'),
        ]);

        //création de 5 domaines
        Domaine::create([
            'id' => 1,
            'libelle' => 'Informatique',
        ]);
        Domaine::create([
            'id' => 2,
            'libelle' => 'Marketing',
        ]);
        Domaine::create([
            'id' => 3,
            'libelle' => 'Management',
        ]);
        Domaine::create([
            'id' => 4,
            'libelle' => 'Comptabilité',
        ]);
        Domaine::create([
            'id' => 5,
            'libelle' => 'Ressources Humaines',
        ]);
        //création de 3 intevenants
        Intervenant::create([
            'id' => 1,
            'nom' => 'cris',
            'prenom' => 'depay',
            'telephone' => '0606060606',
            'email' => 'cris@depay.fr',
        ]);
        Intervenant::create([
            'id' => 2,
            'nom' => 'vitinha',
            'prenom' => 'sg',
            'telephone' => '0606060606',
            'email' => 'vitinha@sg.fr',
        ]);
        Intervenant::create([
            'id' => 3,
            'nom' => 'saul',
            'prenom' => 'goodman',
            'telephone' => '0606060606',
            'email' => 'saul@goodman.fr',
        ]);
        //création de 15 formations (au moins 4 formations par domaine)
        Formation::create([
            'id' => 1,
            'intitule' => 'Développeur Web',
            'duree' => 6,
            'nb_places_max' => 10,
            'cout' => 5000,
            'domaine_id' => 1,
            'intervenant_id' => 1,
        ]);
        Formation::create([
            'id' => 2,
            'intitule' => 'Développeur Mobile',
            'duree' => 6,
            'nb_places_max' => 10,
            'cout' => 500,
            'domaine_id' => 1,
            'intervenant_id' => 1,
        ]);
        Formation::create([
            'id' => 3,
            'intitule' => 'Développeur Java',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 5000,
            'domaine_id' => 1,
            'intervenant_id' => 2,
        ]);
        Formation::create([
            'id' => 4,
            'intitule' => 'Développeur Python',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 4000,
            'domaine_id' => 1,
            'intervenant_id' => 2,
        ]);
        Formation::create([
            'id' => 5,
            'intitule' => 'Marketing Digital',
            'duree' => 6,
            'nb_places_max' => 2,
            'cout' => 100000,
            'domaine_id' => 2,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 6,
            'intitule' => 'Marketing de contenu',
            'duree' => 6,
            'nb_places_max' => 7,
            'cout' => 5000,
            'domaine_id' => 2,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 7,
            'intitule' => 'Marketing de produit',
            'duree' => 6,
            'nb_places_max' => 3,
            'cout' => 5000,
            'domaine_id' => 2,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 8,
            'intitule' => 'Management de projet',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 5000,
            'domaine_id' => 3,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 9,
            'intitule' => 'Management de qualité',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 10,
            'domaine_id' => 3,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 10,
            'intitule' => 'Management de risque',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 5000,
            'domaine_id' => 3,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 11,
            'intitule' => 'Comptabilité générale',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 5000,
            'domaine_id' => 4,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 12,
            'intitule' => 'Comptabilité analytique',
            'duree' => 6,
            'nb_places_max' => 1,
            'cout' => 600,
            'domaine_id' => 4,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 13,
            'intitule' => 'Comptabilité de gestion',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 700,
            'domaine_id' => 4,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 14,
            'intitule' => 'Ressources Humaines',
            'duree' => 6,
            'nb_places_max' => 5,
            'cout' => 530,
            'domaine_id' => 5,
            'intervenant_id' => 3,
        ]);
        Formation::create([
            'id' => 15,
            'intitule' => 'Ressources Humaines',
            'duree' => 6,
            'nb_places_max' => 100,
            'cout' => 5000,
            'domaine_id' => 5,
            'intervenant_id' => 3,
        ]);
        //création de plusieurs sessions pour chaque formation
        Session::create([
            'id' => 1,
            'date' => '2024-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 10,
            'formation_id' => 1,
        ]);
        Session::create([
            'id' => 2,
            'date' => '2024-04-11 14:00:00',
            'lieu' => 'Marseille',
            'nb_places_restantes' => 10,
            'formation_id' => 1,
        ]);
        //session avec date passée
        Session::create([
            'id' => 3,
            'date' => '2021-04-11 09:00:00',
            'lieu' => 'Marseille',
            'nb_places_restantes' => 10,
            'formation_id' => 1,
        ]);
        //session avec date furture
        Session::create([
            'id' => 4,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Toulouse',
            'nb_places_restantes' => 5,
            'formation_id' => 1,
        ]);
        //session avec 0 places restantes
        Session::create([
            'id' => 5,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Aurillac',
            'nb_places_restantes' => 0,
            'formation_id' => 2,
        ]);
        //session pour les autres formations en changeant le lieu et le nombre de places restantes date future et date passée
        Session::create([
            'id' => 6,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 2,
        ]);
        Session::create([
            'id' => 7,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Montpellier',
            'nb_places_restantes' => 5,
            'formation_id' => 3,
        ]);
        Session::create([
            'id' => 20,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 0,
            'formation_id' => 3,
        ]);
        Session::create([
            'id' => 9,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Toulouse',
            'nb_places_restantes' => 5,
            'formation_id' => 5,
        ]);
        Session::create([
            'id' => 10,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Colombes',
            'nb_places_restantes' => 5,
            'formation_id' => 6,
        ]);
        Session::create([
            'id' => 11,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 7,
        ]);
        Session::create([
            'id' => 12,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 8,
        ]);
        Session::create([
            'id' => 13,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 9,
        ]);
        Session::create([
            'id' => 14,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Madrid',
            'nb_places_restantes' => 5,
            'formation_id' => 10,
        ]);
        Session::create([
            'id' => 15,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 11,
        ]);
        Session::create([
            'id' => 16,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Rabat',
            'nb_places_restantes' => 5,
            'formation_id' => 12,
        ]);
        Session::create([
            'id' => 17,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 13,
        ]);
        Session::create([
            'id' => 18,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Rotterdam',
            'nb_places_restantes' => 5,
            'formation_id' => 14,
        ]);
        Session::create([
            'id' => 19,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 5,
            'formation_id' => 15,
        ]);
        //ajout de quelsues session à 0 places restantes
        Session::create([
            'id' => 21,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 0,
            'formation_id' => 4,
        ]);
        Session::create([
            'id' => 22,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 0,
            'formation_id' => 5,
        ]);
        Session::create([
            'id' => 23,
            'date' => '2025-04-11 09:00:00',
            'lieu' => 'Paris',
            'nb_places_restantes' => 0,
            'formation_id' => 6,
        ]);
        //création de 10 inscriptions
        Inscription::create([
            'id' => 1,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 5,
            'session_id' => 1,
        ]);
        Inscription::create([
            'id' => 2,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 5,
            'session_id' => 2,
        ]);
        Inscription::create([
            'id' => 3,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 6,
            'session_id' => 3,
        ]);
        Inscription::create([
            'id' => 4,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 7,
            'session_id' => 4,
        ]);
        Inscription::create([
            'id' => 5,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 8,
            'session_id' => 5,
        ]);
        Inscription::create([
            'id' => 6,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 9,
            'session_id' => 6,
        ]);
        Inscription::create([
            'id' => 7,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 10,
            'session_id' => 7,
        ]);
        Inscription::create([
            'id' => 9,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 4,
            'session_id' => 9,
        ]);
        Inscription::create([
            'id' => 10,
            'date_inscription' => '2025-04-11 09:00:00',
            'utilisateur_id' => 3,
            'session_id' => 10,
        ]);

    }
}
