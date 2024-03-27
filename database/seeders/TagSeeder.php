<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $profileId = 1; // temp profil-id

        $webDeveloperTags = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP',
            'React',
            'Node.js',
            'Vue,js',
            'Front-end',
            'Back-end',
            'Laravel',
            // Lägg till mer sen
        ];

        $digitalDesignerTags = [
            'UI Design',
            'UX Design',
            'Graphic Design',
            'Adobe Photoshop',
            'Front-end',
            'Figma',
            'Logo-design',
            'Fonts',
            // Lägg till mer sen
        ];

        foreach ($webDeveloperTags as $tag) {
            Tag::create([
                'profile_id' => $profileId,
                'category_name' => 'Web Developer',
                'tag_name' => $tag,
                'isPicked' => false,
            ]);
        }

        foreach ($digitalDesignerTags as $tag) {
            Tag::create([
                'profile_id' => $profileId,
                'category_name' => 'Digital Designer',
                'tag_name' => $tag,
                'isPicked' => false, 
            ]);
        }
    }
}

