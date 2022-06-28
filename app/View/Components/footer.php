<?php

namespace App\View\Components;

use App\Models\About;
use Illuminate\View\Component;

class footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $task =About::where('id', $id)->first();
        $about = About::where('name', 'namecompany');
        $navbar = [
            'Beranda' => '/',
            'Produk' => '/product',
            'Tentang' => '/about',
            'Artikel' => '/article',
            'Kalkulator Sehat' => '/recomendation',
        ];
        return view('components.footer', compact('navbar', 'about'));
    }
}
