<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index(){
        return view('recomendation');
    }

    //bmi
    public function bmi(){
        return view('calc.bmi');
    }
    
    public function bmistore(Request $request){
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
        $kalkulator['bmi'] = "<h6>"." Nilai BMI anda: ".$kalkulator['bmi']."</h6>";
        return view('calc.bmi',[
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'success' => $kalkulator['bmi'],
            'success2' => $kalkulator['descbmi'],
        ]);
    }

    //rmr
    public function rmr(){
        return view('calc.rmr');
    }

    public function rmrstore(Request $request){
        //rmr
        if($request->age != 0 && $request->height != 0 && $request->weight != 0){
            $temp = ($request->height/100) * ($request->height/100);
            // dd($temp);
            if($request->gender == 1){
                $temp = (88.362+(13.397 * $request->weight) + (4.799 * $request->height) - (5.677 * $request->age));
            }else{
                $temp = (447.593 + (9.247 * $request->weight) + (3.098 * $request->height) - (4.330 * $request->age));
            }
            $kalkulator['rmr'] = "<h6>"." Kebutuhan rmr anda: ".round( $temp,0)."Kcal"."</h6>";
        }else{
            $kalkulator['rmr'] = 0;
        }
        // dd($kalkulator);
        return view('calc.rmr',[
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'success' => $kalkulator['rmr'],
        ]);
    }

    //eer
    public function eer(){
        return view('calc.eer');
    }

    public function eerstore(Request $user){
        //eer
        // normalisasi activitie
        if($user->activity == 1){
            $temp = 1;
        }elseif($user->activity == 2 && $user->gender ==1){
            $temp = 1.11;
        }elseif($user->activity == 2 && $user->gender ==2){
            $temp = 1.12;
        }elseif($user->activity == 3 && $user->gender ==1){
            $temp = 1.25;
        }elseif($user->activity == 3 && $user->gender ==2){
            $temp = 1.27;
        }elseif($user->activity == 4 && $user->gender ==1){
            $temp = 1.48;
        }elseif($user->activity == 4 && $user->gender ==2){
            $temp = 1.45;
        }
        // dd($user);
        if($user->age != 0 && $user->height != 0 && $user->weight != 0){
            if($user->gender == 1){
                $temp = (662-(9.53 * $user->age) + ($temp *((15.91*$user->weight)+(539.6*($user->height/100))) ));
            }else{
                $temp = (354-(6.91 * $user->age) + ($temp *((9.36*$user->weight)+(726*($user->height/100))) ));
            }
            $kalkulator['eer'] = round( $temp,0);
        }else{
            $kalkulator['eer'] = 0;
        }
        // dd($kalkulator);
        $kalkulator['eer'] = "<h6>"." Kebutuhan kalori anda: ".$kalkulator['eer']."Kcal"."</h6>";
        return view('calc.eer',[
            'age' => $user->age,
            'height' => $user->height,
            'gender' => $user->gender,
            'activity' => $user->activity,
            'weight' => $user->weight,
            'success' => $kalkulator['eer'],
        ]);
    }

    //tdee
    public function tdee(){
        return view('calc.tdee');
    }

    public function tdeestore(Request $user){
        //tdee
        if($user->exercise_activity == 1){
            $temp = 1.2;
        }elseif($user->exercise_activity == 2){
            $temp = 1.375;
        }elseif($user->exercise_activity == 3){
            $temp = 1.55;
        }elseif($user->exercise_activity == 4){
            $temp = 1.725;
        }elseif($user->exercise_activity == 5){
            $temp = 1.9;
        }else{
            $temp = null;
        }
        // dd($temp);
        if($user->age != 0 && $user->height != 0 && $user->weight != 0 && $user->exercise_activity != 0){
            if($user->gender == 1){
                $temp *= (66.5+(13.7 * $user->weight) + ((5*$user->height)-($user->age*6.8)));
            }else{
                $temp *= (655+(9.6 * $user->weight) + ((1.8*$user->height)-($user->age*4.7)));
            }
            $kalkulator['tdee'] = round( $temp,0);
        }else{
            $kalkulator['tdee'] = 0;
        }
        // dd($user);
        $kalkulator['tdee'] = "<h6>"." Kebutuhan kalori yang anda bakar: ".$kalkulator['tdee']."Kcal"."</h6>";
        return view('calc.tdee',[
            'age' => $user->age,
            'height' => $user->height,
            'gender' => $user->gender,
            'activity' => $user->exercise_activity,
            'weight' => $user->weight,
            'success' => $kalkulator['tdee'],
        ]);
    }
}