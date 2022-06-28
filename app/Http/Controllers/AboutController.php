<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $pages = 'Produk';
        return view('about', ['pages' => $pages]);
    }
}
