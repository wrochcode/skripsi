<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutAdmin extends Controller
{
    public function index()
    {
        return view('admin.about', [
            'abouts' => About::orderby('id', 'asc')->get(),
        ]);
    }

    // public function update(Request $request, $id)
    public function update(AboutRequest $request, $id)
    {
        // DB::table('tasks')->where('id', $id)-> update(['list'=> $request->list]);
        dd($request->name);
        // About::find($id)->update([
        //     'name'=> $request->name,
        //     'value'=> $request->value,
        // ]);
        // return redirect('/aboutadmin')->with('success', 'Data Update');
    }
}
