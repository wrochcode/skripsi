<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index(Request $request)
    {
        // $food = 'oi';
        return view('recomendation');
    }
}
