<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        //
    }
    
    public function store(RegistrationRequest $request)
    {
        // dd($request);
        User::create($request->all());
        return redirect('user')->with('success', 'Data berhasil dibuat.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
