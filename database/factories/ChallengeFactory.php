<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar una fecha de inicio entre dos meses atrás y dos meses adelante
        $startDate = $this->faker->dateTimeBetween('-2 months', '+2 months');

        // Generar una fecha de finalización que sea al menos 5 días después de la fecha de inicio
        $endDate = (clone $startDate)->modify('+5 days');

        // Opciones de dificultad
        $difficultyOptions = ['low', 'medium', 'high'];

        $roles_id = Role::whereIn('name', ['Admin', 'Sponsor', 'Coach'])->pluck('id');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'difficulty' => $this->faker->randomElement($difficultyOptions),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'user_id' => User::whereIn('role_id', $roles_id)->inRandomOrder()->first()->id // Asignar un usuario aleatoriamente
        ];
    }
}
