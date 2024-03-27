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

        Auth::login($user);

        return redirect()->route('profile.show', ['id' => $user->id]);
    }
}
