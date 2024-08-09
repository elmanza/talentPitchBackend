<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Achievement;
use App\Models\Audience;
use App\Models\User;
use App\Models\UserAchievement;
use App\Models\UserAudience;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('User seeders running...');
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
