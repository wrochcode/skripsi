<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('admin.event', [
        'events' => Event::all(),
        ]);
    }

    public function store(Request $request){
        Event::create($request->all());

        return redirect('event')->with('success', 'Event has success added.');
    }
}
