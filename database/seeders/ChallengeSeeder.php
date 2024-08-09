<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\ChallengeJudge;
use App\Models\ChallengeParticipants;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoChallenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenges = Challenge::factory(10)->create();
        $roles_id = Role::whereNotIn('name', ['Admin', 'Sponsor', 'Judge'])->pluck('id');
        $judge_role = Role::where('name', 'Judge')->pluck('id');
        foreach($challenges as $challenge){

            // Asignamos los jueces
            $judges = User::whereIn('role_id', $judge_role)
                                ->inRandomOrder()
                                ->take(mt_rand(1, 3))
                                ->get();
            foreach($judges as $judge){
                ChallengeJudge::create([
                    'user_id' => $judge->id,
                    'challenge_id' => $challenge->id
                ]);
            }

            // Añadimos particimantes
            $participants = mt_rand(0, 1);
            if($participants){
                $users = User::whereIn('role_id', $roles_id)
                                ->where('id', '!=', $challenge->user_id)
                                ->inRandomOrder()
                                ->take(mt_rand(1, 8))
                                ->get();

                foreach($users as $user){

                    // Lo agregamos a la competencia
                    ChallengeParticipants::create([
                        'user_id' => $user->id,
                        'challenge_id' => $challenge->id
                    ]);

                    // Agregamos el video del participante
                    $video = Video::factory(1)->state([
                        'is_pitch' => false,
                        'user_id' => $user->id
                    ])->create();

                    // Asociamos el video del participante al challenge
                    VideoChallenge::create([
                        'video_id' => $video[0]->id,
                        'challenge_id' => $challenge->id
                    ]);

                }
            }
        }


    }
}
