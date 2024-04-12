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
        // Validate the request data
        $request->validate([
            // Add any validation rules as needed
            'chosen_options' => 'required|array',
            'chosen_options.*.id' => 'required|exists:this_or_thats,id',
            'chosen_options.*.chosen_option' => 'required',
        ]);

        // Loop through each chosen option in the request
        foreach ($request->input('chosen_options') as $chosenOption) {
            Log::info($chosenOption);
            // Find the ThisOrThat record by its ID
            $thisOrThat = ThisOrThat::findOrFail($chosenOption['id']);

            // Update the chosen option with the data from the request
            $thisOrThat->update([
                'chosen_option' => $chosenOption['chosen_option'],
            ]);
        }

        // Return a response indicating success
        return response()->json(['message' => 'Cthis is a test to see if it works'], 200);
    }
}
