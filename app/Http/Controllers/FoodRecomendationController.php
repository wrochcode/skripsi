<?php

namespace App\Http\Controllers;

use App\Models\Foodrec;
use Illuminate\Http\Request;

class FoodRecomendationController extends Controller
{
    public function index()
    {
        return view('admin.foodrecomendation', [
            'foods' => Foodrec::all(),
        ]);
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        Foodrec::create([
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
        $food =Foodrec::find($id);
        return view('admin.__makananedit', [
            'food'=>$food,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        Foodrec::find($id)->update([
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
        Foodrec::find($id)->delete();
        return back();
    }
}
