<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(){
        $pages = 'Produk';
        return view('auth.register', ['pages' => $pages]);
    }

    public function store(RegistrationRequest $request)
    {
        // dd($request);
        User::create($request->all());

        return redirect('masuk')->with('success', 'Thank you, you are now registered.');
    }
}
