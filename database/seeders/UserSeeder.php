<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Achievement;
use App\Models\Audience;
use App\Models\User;
use App\Models\UserAchievement;
use App\Models\UserAudience;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('User seeders running...');
        User::create([
            'name' => "Andres",
            'lastname' => "Manzano Ramirez",
            'username' => "armanzano",
            'email' => "ar.manzano.94@gmail.com",
            'image' => 'https://placehold.co/600x400/000000/FFFFFF?text=Andres+Manzano',
            'phone' => '3137245481',
            'phone_country_code' => '57',
            'birthday' => '1994-01-25',
            'email_verified_at' => now(),
            'terms_accepted' => true,
            'role_id' => 1,
            'main_goal_id' => 2,
            'language_id' => 1,
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
        ]);
        $users = User::factory(35)->create();
        $achievements = Achievement::all();
        $audience = Audience::all();


        foreach($users as $user){
            $cant_achievements = mt_rand(0, count($achievements));
            $cant_audience = mt_rand(0, count($audience));

            $achievementsAdded = [];
            $audienceAdded = [];

            for ($i=0; $i < $cant_achievements; $i++) {

                $achievementId = $achievements[mt_rand(0, $cant_achievements - 1)]->id;
                $combination = $user->id . '-' . $achievementId;

                if (!in_array($combination, $achievementsAdded)) {
                    UserAchievement::create([
                        'user_id' => $user->id,
                        'achievement_id' => $achievementId
                    ]);

                    // Almacenada la combinación de identificadores en un array temporal
                    $achievementsAdded[] = $combination;
                }
            }

            for ($i=0; $i < $cant_audience; $i++) {

                $audienceId = $audience[mt_rand(0, $cant_audience - 1)]->id;
                $combination = $user->id . '-' . $audienceId;

                if (!in_array($combination, $audienceAdded)) {
                    UserAudience::create([
                        'user_id' => $user->id,
                        'audience_id' => $audienceId
                    ]);

                    // Almacenada la combinación de identificadores en un array temporal
                    $audienceAdded[] = $combination;
                }
            }
        }
        $this->command->info('User seeders Ended...');
    }
}
