<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    protected $data = ['en', 'es'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $name){
            Language::create([
                "name" => $name
            ]);
        }
    }
}
