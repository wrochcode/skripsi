<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecomendationController extends Controller
{
    public function index(Request $request)
    {
        $pages = 'Produk';
        
        if($request->session()->has('totalsession')){
            $food = $request->session()->get('totalsession');
            $food = $request->session()->put('totalsession', 1 + $food);
		}else{
			echo 'Tidak ada data dalam session.';
            $food = 0;
            $request->session()->put('totalsession', $food + 1);
		}
        // dd($food);
        // $food = 'oi';
        return view('recomendation', ['pages' => $pages, 'foods' => $food]);
    }
}
