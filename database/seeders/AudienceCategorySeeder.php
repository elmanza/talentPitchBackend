<?php

namespace Database\Seeders;

use App\Models\AudienceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AudienceCategorySeeder extends Seeder
{
    protected $data = ['Athletes', 'Artists', 'Creatives'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $name){
            AudienceCategory::create([
                "name" => $name
            ]);
        }
    }
}
