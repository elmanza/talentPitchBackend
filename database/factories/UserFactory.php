<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\MainGoal;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        return [
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'username' => $faker->userName,
            'email' => $faker->unique()->safeEmail,
            'image' => $faker->imageUrl(),
            'phone' => $faker->numerify('##########'),  // Genera un número de 10 dígitos
            'phone_country_code' => $faker->numberBetween(1, 9999),
            'birthday' => $faker->date(),
            'email_verified_at' => now(),
            'terms_accepted' => true,
            'role_id' => Role::inRandomOrder()->first()->id,
            'main_goal_id' => MainGoal::inRandomOrder()->first()->id,
            'language_id' => Language::inRandomOrder()->first()->id,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
