<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchInput = $request->input('search-input');


        $users = User::whereHas('profile', function ($query) use ($searchInput) {
            $query->where('name', 'like', "%$searchInput%");
        })->orWhereHas('profile.tags', function ($query) use ($searchInput) {
            $query->where('tag_name', 'like', "%$searchInput%");
        })->get();

        return view('search', compact('users'));
    }
}
