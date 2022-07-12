<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        $pages = 'Produk';
        return view('auth.register', ['pages' => $pages]);
    }
}
