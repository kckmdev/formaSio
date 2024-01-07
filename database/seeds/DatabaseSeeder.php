<?php

use App\Models\CustomUser;
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
        // Ajouter un utilisateur spécifique
        CustomUser::create([
            'nom' => 'Martin',
            'prenom' => 'Alice',
            'telephone' => '0606060606',
            'email' => 'alice.martin@utilisateur.com',
            'mot_de_passe' => 'motdepasse456', 
            'statut' => 'utilisateur',
        ]);

        // Ajouter un utilisateur spécifique (admin)
        CustomUser::create([
            'nom' => 'Jean',
            'prenom' => 'Dupont',
            'telephone' => '0606060606',
            'email' => 'jean.dupont@admin.com',
            'mot_de_passe' => 'motdepasse456',
            'statut' => 'admin',
        ]);

        // Ajouter 50 utilisateurs aléatoires
        CustomUser::factory()->count(50)->create();
        }

}
