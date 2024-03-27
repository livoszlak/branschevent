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
        $profile = Profile::with('tags')->findOrFail($id);

        if (!$profile) {
            return redirect()->route('error')->with('error', 'Profile not found');
        }

        if (Auth::check()) {
            $editable = (Auth::user()->id === $profile->user_id);
        } else {
            return redirect()->route('login');
        }

        return view('profile', ['profile' => $profile, 'editable' => $editable]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $profile = Profile::findOrFail($id);
        if (Auth::check() && Auth::user()->id === $profile->user_id) {
            return view('profile', ['profile' => $profile, 'editable' => true]);
        } else {
            return view('profile', ['profile' => $profile, 'editable' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {

        $request['has_LIA'] = $request->has('has_LIA') ? true : false;

        $data = $request->validate([
            'street_name' => ['nullable', 'string', 'max:255'],
            'post_code' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string'],
            'has_LIA' => ['nullable', 'boolean'],
            'contact_email' => ['nullable', 'string', 'email'],
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

        $data['user_id'] = Auth::id();

        $profile->fill($data);

        $profile->save();

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
