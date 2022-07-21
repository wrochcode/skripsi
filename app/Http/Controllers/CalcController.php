<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index()
    {
        return view('recomendation');
    }
    public function bmi()
    {
        return view('calc.bmi');
    }
    public function bmistore(Request $request)
    {
        if($request->age != 0 && $request->height != 0 && $request->weight != 0){
            $temp = ($request->height/100) * ($request->height/100);
            // dd($temp);
            $kalkulator['bmi'] = round(  $request->weight / $temp,1);
            if($kalkulator['bmi']<16){
                $kalkulator['descbmi'] = 'Terlalu Kurus';
            }elseif($kalkulator['bmi'] <17){
                $kalkulator['descbmi'] = 'Cukup Kurus';
            }elseif($kalkulator['bmi'] < 18.5){
                $kalkulator['descbmi'] = 'sedikit Kurus';
            }elseif($kalkulator['bmi'] < 25){
                $kalkulator['descbmi'] = 'Normal';
            }elseif($kalkulator['bmi'] < 30){
                $kalkulator['descbmi'] = 'Gemuk';
            }elseif(['bmi'] < 35){
                $kalkulator['descbmi'] = 'Obesitas  Kelas I';
            }elseif($kalkulator['bmi'] <= 40){
                $kalkulator['descbmi'] = 'Obesitas  Kelas II';
            }elseif($kalkulator['bmi'] > 40 ){
                $kalkulator['descbmi'] = 'Obesitas  Kelas III';
            }
        }else{
            $kalkulator['bmi'] = 0;
            $kalkulator['descbmi'] = 'Kategori Berat error';
        }
        // dd($kalkulator);
        return view('calc.bmi',[
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'success' => $kalkulator['bmi'],
            'success2' => $kalkulator['descbmi'],
        ]);
    }
}