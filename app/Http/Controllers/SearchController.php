<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request){
        $searchInput = $request->input('search-input');

        $users = User::whereHas('profile', function($query) use ($searchInput) {
            $query->where('name', 'like', "%$searchInput%"); // Assuming 'name' is the column for user names in the profiles table
        })->orWhereHas('profile.tags', function($query) use ($searchInput) {
            $query->where('tag_name', 'like', "%$searchInput%"); // Assuming 'tag_name' is the column for tag names
        })->get();

        return view('search', compact('users'));
    }
}
