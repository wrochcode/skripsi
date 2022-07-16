<?php

namespace App\Http\Controllers;

use App\Models\Fooduser;
use Illuminate\Http\Request;

class FoodUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.food', [
            'foods' => Fooduser::all(),
        ]);
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        Fooduser::create([
                'name'=> $request->name,
                'calorie'=> $request->calorie,
                'carb'=> $request->carb,
                'fat'=> $request->fat,
                'protein'=> $request->protein,
            ]);
        // Food::create($request->all());
        return redirect('food')->with('success', 'Data berhasil dibuat.');
    }

    public function edit($id)
    {
        $food =Fooduser::find($id);
        return view('admin.__makananedit', [
            'food'=>$food,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        Fooduser::find($id)->update([
            'name'=> $request->name,
            'calorie'=> $request->calorie,
            'carb'=> $request->carb,
            'fat'=> $request->fat,
            'protein'=> $request->protein,
        ]);
        return redirect('food');
    }

    public function destroy($id)
    {
        Fooduser::find($id)->delete();
        return back();
    }
}
