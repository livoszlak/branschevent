<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function toggle(Tag $tag)
    {
        $tag->update(['isPicked' => !$tag->isPicked]);

        return response()->json(['success' => true]);
    }
}
