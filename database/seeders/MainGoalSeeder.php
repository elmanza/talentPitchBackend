<?php

namespace Database\Seeders;

use App\Models\MainGoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainGoalSeeder extends Seeder
{
    protected $data = ['Discover', 'Be discovered'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $name){
            MainGoal::create([
                "name" => $name
            ]);
        }
    }
}
