<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    protected $data = ['Sponsored', 'Hiring', 'Collaboration', 'Training', 'Intermediation'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $name){
            Achievement::create([
                "name" => $name
            ]);
        }

    }
}
