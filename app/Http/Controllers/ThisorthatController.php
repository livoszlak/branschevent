<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Profile;
use App\Models\ThisOrThat;

class ThisorthatController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Request data: ' . json_encode($request->all()));
        $request->validate([
            'chosen_options' => 'required|array',
            'chosen_options.*.id' => 'required|exists:this_or_thats,id',
            'chosen_options.*.chosen_option' => 'required',
        ]);

        foreach ($request->input('chosen_options') as $chosenOption) {
            Log::info($chosenOption);

            $thisOrThat = ThisOrThat::findOrFail($chosenOption['id']);

            $thisOrThat->update([
                'chosen_option' => $chosenOption['chosen_option'],
            ]);
        }
        return response()->json(['message' => 'Cthis is a test to see if it works'], 200);
    }
}
