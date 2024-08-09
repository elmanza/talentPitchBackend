<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $data = ['Admin', 'Talent', 'Scout', 'Judge', 'Sponsor', 'Coach'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $name){
            Role::create([
                "name" => $name
            ]);
        }
    }
}
