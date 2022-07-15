<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Foodrec;
use Illuminate\Http\Request;

class FoodRecomendationController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $i = 0;
        foreach($criterias as $criteria){
            $c1[$i]=$criteria->calorie;
            $c2[$i]=$criteria->carb;
            $c3[$i]=$criteria->fat;
            $c4[$i]=$criteria->protein;
        }
        $Foods = Foodrec::all();
        $max1 = $Foods[0]['calorie'];
        $max2 = $Foods[0]['fat'];
        $max3 = $Foods[0]['carb'];
        $max4 = $Foods[0]['protein'];
        foreach($Foods as $Food){
            $temp=$Food->calorie;
            if($temp>$max1){
                $max1=$temp;
            }
            $s2=$Food->calorie;
            if($temp>$max2){
                $max2=$temp;
            }
            $s1=$Food->calorie;
            if($temp>$max3){
                $max3=$temp;
            }
            $temp=$Food->calorie;
            if($temp>$max4){
                $max4=$temp;
            }
        }
        // dd($c1, $c2, $c3, $c4, $max1, $max2, $max3, $max4);
        return view('admin.foodrecomendation', [
            'foods' => Foodrec::all(),
            'max1' => $max1,
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
