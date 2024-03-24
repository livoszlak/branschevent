<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show(string $id)
    {
        $profile = Profile::findOrFail($id);
        $editable = (Auth::check() && Auth::user()->id === $profile->user_id);
        return view('profile', ['profile' => $profile, 'editable' => $editable]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
