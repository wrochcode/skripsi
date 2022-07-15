<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MasukController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);
        
        if(Auth::attempt($attributes)){
            return redirect('admin')->with('success', 'You are now logded in');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provide credential is not match our records.',
        ]);
    }
}
