<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $companies = User::pluck('name')->ToArray();
        return view('welcome', ['companies' => $companies]);
    }
}
