<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\AudienceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AudienceSeeder extends Seeder
{
    protected $data = [
        'Athletes' => [ 'Gamers', 'Tennis players', 'Basketball players', 'Soccer players', 'Volleyball players', 'Beisball players', 'Other'],
        'Artists' => ['Musicians', 'Dancers', 'Actors', 'Writers', 'Singers', 'Painters', 'Other'],
        'Creatives' => ['Hidden talents', 'Ideas to problems', 'New roles', 'Designers', 'Entrepreneurs', 'Other']
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $category => $subcategories){
            $category = AudienceCategory::where('name', $category)->first();
            foreach($subcategories as $subcategory){
                Audience::create([
                    'name' => $subcategory,
                    'audience_category_id' => $category->id
                ]);
            }
        }

    }
}
