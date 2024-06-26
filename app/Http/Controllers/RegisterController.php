<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\ThisOrThat;

class RegisterController extends Controller
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'participant_count' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect('/registration')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'contact_name' => $request->contact_name,
            'participant_count' => $request->participant_count,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
        ]);

        $questions = [
            ['question' => 'Hänger kollegorna utanför kontoret?', 'option_one' => ' Ja, många av oss har blivit goda vänner och ses ofta utanför arbetsstid.', 'option_two' => 'Ibland, men flera har hektiska liv och behöver sin space på fritiden.'],
            ['question' => 'Vart väljer kollegorna att äta lunch tillsammans?', 'option_one' => 'Det mysiga lilla kaféet med hemlagad mat ', 'option_two' => 'Den trendiga food truck-gatan med internationell street food'],
            ['question' => 'Vad gör ni helst på AW:n?', 'option_one' => 'Karaokekväll!', 'option_two' => 'Ölhak på långgatorna!'],
            ['question' => 'Om ert företag var ett djur, vilket skulle det vara?', 'option_one' => 'En lojal och trofast St Bernardshund', 'option_two' => 'En nyfiken och självständig katt'],
            ['question' => 'Tre ord som beskriver er som företag?', 'option_one' => 'Lekfull, innovativ och passionerad', 'option_two' => 'Ambitiös, stöttande och professionell.'],
        ];

        foreach ($questions as $question) {
            ThisOrThat::create([
                'profile_id' => $profile->id,
                'question' => $question['question'],
                'option_one' => $question['option_one'],
                'option_two' => $question['option_two'],
                'chosen_option' => null
            ]);
        }

        $softwareTags = [
            'Adobe Photoshop',
            'Adobe InDesign',
            'Adobe Illustrator',
            'Figma',
            'Adobe After Effects',
            'Canva',
            'Webflow',
            'Maze',
            'VS Code',
            'Sublime Text',
            'Atom',
            'Webstorm',
            'Eclipse',
            'Rider'
        ];

        $webDeveloperTags = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP',
            'React',
            'Node.js',
            'Vue.js',
            'Frontend',
            'Backend',
            'Laravel',
            'Angular',
            'Bootstrap',
            'Tailwind',
            'C#',
            'ASP.NET',
            'Agil utveckling',
            'Wordpress',
            'Drupal',
            'Python',
            'Ruby',
            'Debugging',
            'SEO'
        ];

        $digitalDesignerTags = [
            'UI',
            'UX',
            'Grafisk design',
            'Motion graphics',
            'Illustration',
            'Typografi',
            'Visuell identitet',
            'Branding',
            'Prototyping',
            'Wireframing',
            'Designsystem',
            'Användartesting',
            'Responsiv design',
            'Copywriting',
            'Användarresearch',
            'Accessible design'
        ];

        foreach ($webDeveloperTags as $tag) {
            Tag::create([
                'profile_id' => $profile->id,
                'category_name' => 'Web Developer',
                'tag_name' => $tag,
                'isPicked' => false,
            ]);
        }

        foreach ($digitalDesignerTags as $tag) {
            Tag::create([
                'profile_id' => $profile->id,
                'category_name' => 'Digital Designer',
                'tag_name' => $tag,
                'isPicked' => false,
            ]);
        }

        foreach ($softwareTags as $tag) {
            Tag::create([
                'profile_id' => $profile->id,
                'category_name' => 'Software',
                'tag_name' => $tag,
                'isPicked' => false,
            ]);
        }

        Auth::login($user);

        return redirect()->route('profile.show', ['id' => $user->id]);
    }
}
