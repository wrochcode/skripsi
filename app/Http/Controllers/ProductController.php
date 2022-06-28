<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $pages = 'Produk';
        return view('products.index', ['pages' => $pages]);
    }
    public function create()
    {
        // return view('products.index');
    }
}
