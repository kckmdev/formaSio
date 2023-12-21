<?php

use App\Models\CustomUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ajouter un utilisateur spécifique
        CustomUser::create([
            'nom' => 'Martin',
            'prenom' => 'Alice',
            'telephone' => '0606060606',
            'email' => 'alice@gmail.com',
            'mot_de_passe' => "mdpmdpmdp",
            'statut' => 'utilisateur',
        ]);

        // Ajouter un utilisateur spécifique (admin)
        CustomUser::create([
            'nom' => 'Jean',
            'prenom' => 'Bob',
            'telephone' => '0606060606',
            'email' => 'bob@gmail.com',
            'mot_de_passe' => "mdpmdpmdp",
            'statut' => 'admin',
        ]);

        // Ajouter 50 utilisateurs aléatoires
        CustomUser::factory()->count(50)->create();
        }

}
