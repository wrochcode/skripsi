<?php

namespace App\Http\Controllers;

use App\Models\Fooduser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FoodUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // Menentukan maksimal -> butuh data
        $Foods = Fooduser::all();

        
        // Menampilkan Kriteria
        $point = DB::table('criterias')->where('name', 'Defisit')->first();
        $metode = $point->name;
        $poincriteria [1] = 'Kalori: '. strval($point->calorie);
        $poincriteria [2] = ', Lemak: '. strval($point->fat);
        $poincriteria [3] = ', Karbohidrat: '. strval($point->carb);
        $poincriteria [4] = ', Protein: '. strval($point->protein);
        // dd($trec);
        
        $alternatif = 0;
        $currentuser = User::find(Auth::user()->id); //get id user
        // dd($currentuser->id);
        foreach($Foods as $Food){
            if($Food->id_user == $currentuser->id){
                $alternatif++;
            }
        }
        $trec = $alternatif;

        // dd($alternatif);
        if($alternatif<1){
            $normalisasi = null;
            return view('admin.userfoodsaw', [
                'foods' => null,
                'recs' => $normalisasi,
                'criterias' => $poincriteria,
                'metode' => $metode,
                'trec' => $trec,
            ]);
        }

        $alternatif = 0;
        
        foreach($Foods as $Food){
            if($Food->id_user == $currentuser->id){
                $makananuser[$alternatif]['id'] = $Food->id;
                $makananuser[$alternatif]['name'] = $Food->name;
                $makananuser[$alternatif]['calorie'] = $Food->calorie;
                $makananuser[$alternatif]['carb'] = $Food->carb;
                $makananuser[$alternatif]['fat'] = $Food->fat;
                $makananuser[$alternatif]['protein'] = $Food->protein;
                $alternatif++;
            }
        }
        // ALgorithma start
        $max1 = $Foods[0]['calorie'];
        $max2 = $Foods[0]['carb'];
        $max3 = $Foods[0]['fat'];
        $max4 = $Foods[0]['protein'];
        foreach($Foods as $Food){
            $temp=$Food->calorie;
            if($temp>$max1){
                $max1=$temp;
            }
            $temp=$Food->carb;
            if($temp>$max2){
                $max2=$temp;
            }
            $temp=$Food->fat;
            if($temp>$max3){
                $max3=$temp;
            }
            $temp=$Food->protein;
            if($temp>$max4){
                $max4=$temp;
            }
        }

        //Normalisasi
        $alternatif = 0;
        $criteria = DB::table('criterias')->where('name', 'Defisit')->first();
        $c1 = $criteria->calorie;
        $c2 = $criteria->carb;
        $c3 = $criteria->fat;
        $c4 = $criteria->protein;
        foreach($Foods as $Food){
            // $normalisasi[$alternatif][1]=$Food->calorie/$max1;
            // $normalisasi[$alternatif][2]=$Food->carb/$max2;
            // $normalisasi[$alternatif][3]=$Food->fat/$max3;
            // $normalisasi[$alternatif][4]=$Food->protein/$max4;
            
            $temp = ($Food->calorie/$max1)*$c1;
            $temp = $temp + (($Food->carb/$max2)*$c2);
            $temp += (($Food->fat/$max3)*$c3);
            $temp += (($Food->protein/$max4)*$c4);
            $normalisasi[$alternatif]['nilai'] = round($temp,4);
            $normalisasi[$alternatif]['name'] = $Food->name;
            $normalisasi[$alternatif]['calorie'] = $Food->calorie;
            $normalisasi[$alternatif]['carb'] = $Food->carb;
            $normalisasi[$alternatif]['fat'] = $Food->fat;
            $normalisasi[$alternatif]['protein'] = $Food->protein;
            $alternatif++;
        }
        $totaldata = count($Foods);
        
        for($i= 0 ;$i<$totaldata;$i++){
            for($j=0;$j<$totaldata-$i-1;$j++){
                if($normalisasi[$j]['nilai']<$normalisasi[$j+1]['nilai']){
                    $temp = $normalisasi[$j]['nilai'];
                    $normalisasi[$j]['nilai'] = $normalisasi[$j+1]['nilai'];
                    $normalisasi[$j+1]['nilai'] = $temp;

                    $temp = $normalisasi[$j]['name'];
                    $normalisasi[$j]['name'] = $normalisasi[$j+1]['name'];
                    $normalisasi[$j+1]['name'] = $temp;

                    $temp = $normalisasi[$j]['calorie'];
                    $normalisasi[$j]['calorie'] = $normalisasi[$j+1]['calorie'];
                    $normalisasi[$j+1]['calorie'] = $temp;

                    $temp = $normalisasi[$j]['carb'];
                    $normalisasi[$j]['carb'] = $normalisasi[$j+1]['carb'];
                    $normalisasi[$j+1]['carb'] = $temp;

                    $temp = $normalisasi[$j]['fat'];
                    $normalisasi[$j]['fat'] = $normalisasi[$j+1]['fat'];
                    $normalisasi[$j+1]['fat'] = $temp;

                    $temp = $normalisasi[$j]['protein'];
                    $normalisasi[$j]['protein'] = $normalisasi[$j+1]['protein'];
                    $normalisasi[$j+1]['protein'] = $temp;
                }
            }
        }

        // dd($normalisasi);
        return view('admin.userfoodsaw', [
            'foods' => $makananuser,
            'recs' => $normalisasi,
            'criterias' => $poincriteria,
            'metode' => $metode,
            'trec' => $trec,
        ]);
        // dd($c1, $c2, $c3, $c4, $max1, $max2, $max3, $max4);
        
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $currentuser = User::find(Auth::user()->id);
        Fooduser::create([
                'id_user'=> $currentuser->id,
                'name'=> $request->name,
                'calorie'=> $request->calorie,
                'carb'=> $request->carb,
                'fat'=> $request->fat,
                'protein'=> $request->protein,
            ]);
        // Food::create($request->all());
        return redirect('fooduser')->with('success', 'Data berhasil dibuat.');
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
        $currentuser = User::find(Auth::user()->id);
        Fooduser::find($id)->update([
            'id_user'=> $currentuser->id,
            'name'=> $request->name,
            'calorie'=> $request->calorie,
            'carb'=> $request->carb,
            'fat'=> $request->fat,
            'protein'=> $request->protein,
        ]);
        return redirect('fooduser');
    }

    public function destroy($id)
    {
        // dd($id);
        Fooduser::find($id)->delete();
        return  redirect('fooduser');
    }
}
