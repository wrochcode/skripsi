<?php

namespace App\Http\Controllers;

use App\Models\Visit;
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
        if($useradmin != 3){
            $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
            
            return view('admin.admin',[
                'namecompany' => $namecompany,
                'visits' => Visit::orderBy('id', 'desc')->get(),
            ]);
        }
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        
        return view('admin.userdashboard',['namecompany'=>$namecompany]);    
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
