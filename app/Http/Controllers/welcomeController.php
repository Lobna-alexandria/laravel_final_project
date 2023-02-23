<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrontSection1;

class welcomeController extends Controller
{
    public function showAll()
    {
        $AlldataP = FrontSection1::all();
        return view('welcome', compact('AlldataP'));
    }
}