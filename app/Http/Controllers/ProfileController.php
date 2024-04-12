<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $editable = false;

        $profile = Profile::with('tags', 'thisOrThat')->findOrFail($id);
        $user = User::findOrFail($id);

        if (!$profile) {
            return redirect()->route('attendees')->with('error', 'Profile not found');
        }

        if (Auth::check()) {
            $editable = (Auth::user()->id === $profile->user_id);
        }

        $questions = $profile->thisOrThat;

        $softwareTags = $profile->tags->filter(function ($tag) {
            return $tag->category_name == 'Software';
        })->sortBy('tag_name');

        $developerTags = $profile->tags->filter(function ($tag) {
            return $tag->category_name == 'Web Developer';
        })->sortBy('tag_name');

        $designTags = $profile->tags->filter(function ($tag) {
            return $tag->category_name == 'Digital Designer';
        })->sortBy('tag_name');

        return view('profile', ['profile' => $profile, 'editable' => $editable, 'questions' => $questions, 'user' => $user, 'softwareTags' => $softwareTags, 'developerTags' => $developerTags, 'designTags' => $designTags]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $profile = Profile::findOrFail($id);
        $questions = $profile->thisOrThat;

        if (Auth::check() && Auth::user()->id === $profile->user_id) {
            return view('profile', ['profile' => $profile, 'questions' => $questions, 'editable' => true]);
        } else {
            return view('profile', ['profile' => $profile, 'questions' => $questions, 'editable' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $user = User::findOrFail($profile->id);
        $request['has_LIA'] = $request->has_LIA == 'true' ? true : false;

        $data = $request->validate([
            'about' => ['nullable', 'string'],
            'has_LIA' => ['nullable', 'boolean'],
            'contact_email' => ['nullable', 'string', 'email'],
            'participant_count' => ['nullable'],
            'contact_LinkedIn' => ['nullable', 'string'],
            'contact_url' => ['nullable', 'string'],
            'profile_image' => ['nullable', 'image']
        ]);


        // If the user leaves fields empty when editing their profile, when they previously entered information, this prevents it from writing over the old value with null
        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = $request->user()->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_images', $filename, 'public');
            $data['profile_image'] = $filename;
        }

        $data['participant_count'] = (int)$data['participant_count'];
        $data['user_id'] = Auth::id();

        $profile->fill($data);
        $profile->save();

        $user->participant_count = $data['participant_count'];
        $user->save();


        if ($request->has('questions')) {
            foreach ($request->questions as $questionId => $chosenOption) {
                $question = $profile->thisOrThat()->find($questionId);
                if ($question) {
                    $question->chosen_option = $chosenOption;
                    $question->save();
                }
            }
        }

        session()->flash('message', 'Dina uppgifter är uppdaterade!');

        return redirect()->back()->with('Success', 'Profile status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
