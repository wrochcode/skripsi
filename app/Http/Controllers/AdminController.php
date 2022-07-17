<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $useradmin = Auth::user()->role;
        $event = DB::table('events')->latest('id')->first();
        if($useradmin != 3){
            $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
            
            return view('admin.admin',[
                'namecompany' => $namecompany,
                'visits' => Visit::orderBy('id', 'desc')->get(),
                'event' => $event->name,
                'value' => $event->value,
            ]);
        }
        
        return view('admin.userdashboard',[
            'event' => $event->name,
            'value' => $event->value,
            ]);    
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
