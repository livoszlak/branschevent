<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Tag;
use App\Models\ThisOrThat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Company AB',
            'contact_name' => 'Test Contactsson',
            'participant_count' => 2,
            'email' => 'test@example.com',
            'password' => Hash::make('12345678')
        ]);

        Profile::create([
            'user_id' => 1,
            'about' => 'Vi är ett superföretag som älskar WordPress',
            'has_LIA' => true,
            'contact_email' => 'contact@example.com',
            'contact_LinkedIn' => 'http://linkedin.com/CompanyAB',
            'contact_url' => 'http://company-ab.com',
            'profile_image' => ''
        ]);

        $questions = [
            ['question' => 'Karaoke eller ölhak på AW?', 'option_one' => 'Karaoke', 'option_two' => 'Ölhak'],
            ['question' => 'Om vårt företag var ett djur skulle vi vara...', 'option_one' => 'Hund', 'option_two' => 'Katt'],
            ['question' => 'Soluppgång eller solnedgång?', 'option_one' => 'Soluppgång', 'option_two' => 'Solnedgång'],
            ['question' => 'På kickoff-resa åker vi till...', 'option_one' => 'Köpenhamn', 'option_two' => 'London'],
            ['question' => 'Vår arbetsmiljö är...', 'option_one' => 'Lugn och avslappnad', 'option_two' => 'Intensiv och fartfylld'],
        ];


        foreach ($questions as $question) {
            ThisOrThat::create([
                'profile_id' => 1,
                'question' => $question,
                'option_one' => $question['option_one'],
                'option_two' => $question['option_two'],
                'chosen_option' => null,
            ]);
        }
    }
}
