<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutAdmin extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }
    
    public function edit(About $task)
    // public function edit($id)
    {
        // $task =Task::find($id);//only id
        // dd($task);
        // $task =Task::where('id', $id)->first();
        // $task = DB::table('tasks')->where('id', $id)->first();
        return view('About.edit', [
            'task'=>$task,
            'submit'=> 'Update'
        ]);
    }

    // public function update(Request $request, $id)
    public function update(AboutRequest $request, $id)
    {
        // DB::table('tasks')->where('id', $id)-> update(['list'=> $request->list]);
        About::find($id)->update([
            'name'=> $request->list,
            'value'=> $request->list,
    ]);
        return redirect('/aboutadmin');
    }
}
