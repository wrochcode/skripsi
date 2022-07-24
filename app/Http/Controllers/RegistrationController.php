<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\ProfilUserModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function create(){
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        return view('auth.daftar', [
            'namecompany' => $namecompany,
        ]);
    }

    public function store(RegistrationRequest $request)
    {
        // dd($request);
        User::create($request->all());
        $sumuser= count(User::all());
        ProfilUserModel::create([
            'id_user'=> $sumuser,
            'planing' => 1,
            'gender' => 1,
            'age' => 1,
            'height' => 170,
            'weight' => 70,
            'activity' => 1,
            'exercise_activity' => 1,
        ]);

        return redirect('masuk')->with('success', 'Thank you, you are now registered.');
    }
}
