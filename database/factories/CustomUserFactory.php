<?php

namespace Database\Factories;

use App\Models\CustomUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomUserFactory extends Factory
{

    protected $model = CustomUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'mot_de_passe' => $this->faker->password,
            'statut' => $this->faker->randomElement(['utilisateur', 'admin']),
        ];
    }
}
