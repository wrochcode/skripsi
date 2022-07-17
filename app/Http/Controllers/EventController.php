<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('admin.event', [
            'events' => Event::orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request){
        Event::create($request->all());

        return redirect('event')->with('success', 'Event has success added.');
    }

    public function edit($id){
        $food =Event::find($id);
        return view('admin.__makananedit', [
            'food'=>$food,
        ]);
    }
    
    public function update(Request $request, $id){
        Event::find($id)->update([
            'name'=> $request->name,
            'calorie'=> $request->calorie,
            'carb'=> $request->carb,
            'fat'=> $request->fat,
            'protein'=> $request->protein,
        ]);
        return redirect('food');
    }

    public function destroy($id){
        Event::find($id)->delete();
        return back();
    }
}
