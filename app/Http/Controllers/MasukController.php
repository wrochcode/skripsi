<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasukController extends Controller
{
    public function create()
    {
        $pages = 'Produk';
        return view('about', ['pages' => $pages]);
    }
}
