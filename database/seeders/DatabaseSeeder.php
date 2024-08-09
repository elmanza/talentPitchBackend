<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\ChallengeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MainGoalSeeder::class,
            AchievementSeeder::class,
            RoleSeeder::class,
            LanguageSeeder::class,
            AudienceCategorySeeder::class,
            AudienceSeeder::class,
            UserSeeder::class,
            ChallengeSeeder::class
        ]);

    }
}
