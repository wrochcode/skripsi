<?php

namespace App\Http\Controllers;

use App\Models\Foodsmenu;
use App\Models\ProfilUserModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $useradmin = Auth::user()->role;
        // $event = DB::table('events')->latest('id')->first();
        if($useradmin != 3){
            return redirect('dashboard');
        }
        
        //inisialisasi
        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();
        
        
        //kalkulator sehat
        //bmi
        if($user->age != 0 && $user->height != 0 && $user->weight != 0){
            $temp = ($user->height/100) * ($user->height/100);
            // dd($temp);
            $kalkulator['bmi'] = round(  $user->weight / $temp,1);
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

        //rmr
        if($user->age != 0 && $user->height != 0 && $user->weight != 0){
            $temp = ($user->height/100) * ($user->height/100);
            // dd($temp);
            if($user->gender == 1){
                $temp = (88.362+(13.397 * $user->weight) + (4.799 * $user->height) - (5.677 * $user->age));
            }else{
                $temp = (447.593 + (9.247 * $user->weight) + (3.098 * $user->height) - (4.330 * $user->age));
            }
            $kalkulator['rmr'] = round( $temp,0);
        }else{
            $kalkulator['rmr'] = 0;
        }

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
        
        if($user->age != 0 && $user->height != 0 && $user->weight != 0){
            if($user->gender == 1){
                $temp = (662-(9.53 * $user->age) + ($temp *((15.91*$user->weight)+(539.6*($user->height/100))) ));
            }else{
                $temp = (354-(6.91 * $user->age) + ($temp *((9.36*$user->weight)+(726*($user->height/100))) ));
            }
            $kalkulator['eer'] = round( $temp,2);
        }else{
            $kalkulator['eer'] = 0;
        }
        
        // tdee
        // normalisasi activitie
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
            $kalkulator['tdee'] = round( $temp,1);
        }else{
            $kalkulator['tdee'] = 0;
        }
        
        // Serat
        $kalkulator['serat'] = ($kalkulator['tdee']/1000) * 14;
        
        // Protein
        $temp1 = round(($kalkulator['tdee']*0.1),0);
        $temp2 = round(($kalkulator['tdee']*0.15),0);
        $kalkulator['protein'] = "(".$temp1." - ". $temp2." kcal)";
        $temp3 = round((($kalkulator['tdee']*0.1)/4),0);
        $temp4 = round((($kalkulator['tdee']*0.15)/4),0);
        $kalkulator['proteingram'] = $temp3." - ". $temp4." gram";
        
        // karbohidrat
        $temp1 = round($kalkulator['tdee']*0.6,0);
        $temp2 = round($kalkulator['tdee']*0.75,0);
        $kalkulator['carb'] = "(".$temp1." - ". $temp2." kcal)";
        $temp3 = round((($kalkulator['tdee']*0.6)/4),0);
        $temp4 = round((($kalkulator['tdee']*0.75)/4),0);
        $kalkulator['carbgram'] = $temp3." - ". $temp4." gram";

        // dd($kalkulator['tdee']);
        // Lemak
        $temp1 = round(($kalkulator['tdee']*0.1),2);
        $temp2 = round(($kalkulator['tdee']*0.25),2);
        $kalkulator['fat'] = "(".$temp1." - ". $temp2." kcal)";
        $temp3 = round(($kalkulator['tdee']*0.1)/9,2);
        $temp4 = round(($kalkulator['tdee']*0.25)/9,2);
        $kalkulator['fatgram'] = $temp3." - ". $temp4." gram";

        // dd($kalkulator);
        // normalisasi user
        if($user->gender == 1){
            $user->gender = 'Laki - Laki';
        }else{
            $user->gender = 'Perempuan';
        }
        return view('user.myaccount',[
            'kalkulator' => $kalkulator,
            'namecompany' => $namecompany,
            'profiluser' => $user,
            ]);
    }
    
    public function menu(){
        //inisialisasi
        $iduser = 1;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $mainuser = DB::table('users')->where('id', $iduser)->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();

        //menu
        $alternatif = 0;
        $currentuser = $iduser; //get id user
        // $currentuser = User::find(Auth::user()->id); //get id user

        // Menentukan maksimal -> butuh data
        $Foods = Foodsmenu::all();

        $point = DB::table('criterias')->where('name', 'Defisit')->first();
        $metode = $point->name;
        $poincriteria [1] = 'Kalori: '. strval($point->calorie);
        $poincriteria [2] = ', Lemak: '. strval($point->fat);
        $poincriteria [3] = ', Karbohidrat: '. strval($point->carb);
        $poincriteria [4] = ', Protein: '. strval($point->protein);
        
        
        // dd($currentuser->id);
        foreach($Foods as $Food){
            if($Food->id_user == $currentuser){
                $alternatif++;
            }
        }
        $trec = $alternatif;
        if($trec>5){
            $trec=5;
        }

        // dd($alternatif);
        if($alternatif<1){
            $normalisasi = null;
            return view('user.mymenu', [
                'foods' => null,
                'recs' => null,
                'profiluser' => $user,
                'fooddatabases' => $Foods,
                'criterias' => $poincriteria,
                'metode' => $metode,
                'trec' => $trec,
            ]);
        }

        $alternatif = 0;
        // dd($Foods);
        foreach($Foods as $Food){
            if($Food->id_user == $currentuser){
                $makananuser[$alternatif]['id'] = $Food->id;
                $makananuser[$alternatif]['id_user'] = $Food->id_user;
                $makananuser[$alternatif]['name'] = $Food->name;
                $makananuser[$alternatif]['calorie'] = $Food->calorie;
                $makananuser[$alternatif]['carb'] = $Food->carb;
                $makananuser[$alternatif]['fat'] = $Food->fat;
                $makananuser[$alternatif]['protein'] = $Food->protein;
                $alternatif++;
            }
        }
        
        // ALgorithma start cari max
        $max1 = $makananuser[0]['calorie'];
        $max2 = $makananuser[0]['carb'];
        $max3 = $makananuser[0]['fat'];
        $max4 = $makananuser[0]['protein'];
        for($i=0 ; $i< $trec ; $i++){
            $temp=$makananuser[$i]['calorie'];
            if($temp>$max1){
                $max1=$temp;
            }
            $temp=$makananuser[$i]['carb'];
            if($temp>$max2){
                $max2=$temp;
            }
            $temp=$makananuser[$i]['fat'];
            if($temp>$max3){
                $max3=$temp;
            }
            $temp=$makananuser[$i]['protein'];
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

        // dd($makananuser);
        for($i=0 ; $i< $trec ; $i++){
            // dd(1/4);
            if($max1!=0){
                $temp = ($makananuser[$i]['calorie']/$max1)*$c1;
            }
            if($max2!=0){
                $temp = $temp + (($makananuser[$i]['carb']/$max2)*$c2);
            }
            if($max3!=0){
                $temp += (($makananuser[$i]['fat']/$max3)*$c3);
            }
            if($max4!=0){
                $temp += (($makananuser[$i]['protein']/$max4)*$c4);
            }
            
            $normalisasi[$alternatif]['nilai'] = round($temp,4);
            $normalisasi[$alternatif]['id_user'] = $makananuser[$i]['id_user'];
            $normalisasi[$alternatif]['name'] = $makananuser[$i]['name'];
            $normalisasi[$alternatif]['calorie'] = $makananuser[$i]['calorie'];
            $normalisasi[$alternatif]['carb'] = $makananuser[$i]['carb'];
            $normalisasi[$alternatif]['fat'] = $makananuser[$i]['fat'];
            $normalisasi[$alternatif]['protein'] = $makananuser[$i]['protein'];
            $alternatif++;
        }
        
        for($i= 0 ;$i<$trec;$i++){
            for($j=0;$j<$trec-$i-1;$j++){
                if($normalisasi[$j]['nilai']<$normalisasi[$j+1]['nilai']){
                    $temp = $normalisasi[$j]['nilai'];
                    $normalisasi[$j]['nilai'] = $normalisasi[$j+1]['nilai'];
                    $normalisasi[$j+1]['nilai'] = $temp;

                    $temp = $normalisasi[$j]['id_user'];
                    $normalisasi[$j]['id_user'] = $normalisasi[$j+1]['id_user'];
                    $normalisasi[$j+1]['id_user'] = $temp;

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
        if($trec>5){
            $trec = 5;
        }

        // dd($makananuser);
        return view('user.mymenu',[
            'foods' => $makananuser,
            'recs' => null,
            'profiluser' => $user,
            'fooddatabases' => $Foods,
            'criterias' => $poincriteria,
            'metode' => $metode,
            'trec' => $trec,
            ]);
    }

    public function profile(){
        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $mainuser = DB::table('users')->where('id', $iduser)->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();
        if($user->exercise_activity == 1){
            $exercise_activity = "Sangat Jarang";
        }elseif($user->exercise_activity == 2){
            $exercise_activity = "Jarang(1-2 kali seminggu)";
        }elseif($user->exercise_activity == 3){
            $exercise_activity = "Normal(2-3 kali seminggu)";
        }elseif($user->exercise_activity == 4){
            $exercise_activity = "Sering(4-5 kali seminggu)";
        }elseif($user->exercise_activity == 5){
            $exercise_activity = "Sangat Sering(2 kali sehari)";
        }else{
            $exercise_activity = "null";
        }
        
        if($user->activity == 1){
            $activity = "Menetap";
        }elseif($user->activity == 2){
            $activity = "Kurang Aktif";
        }elseif($user->activity == 3){
            $activity = "Aktif";
        }elseif($user->activity == 4){
            $activity = "Sangat Aktif";
        }else{
            $activity = "null";
        }

        
        if($user->gender == 1){
            $gender = "Laki-laki";
        }elseif($user->gender == 2){
            $gender = "Perempuan";
        }else{
            $gender = "null";
        }

        // dd($user);
        return view('user.myprofile',[
            'namecompany' => $namecompany,
            'mainuser' => $mainuser,
            'profiluser' => $user,
            'exercise_activity' => $exercise_activity,
            'activity' => $activity,
            'gender' => $gender,
            ]);
    }

    public function profilestore(Request $request){
        // dd($request);
        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $mainuser = DB::table('users')->where('id', $iduser)->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();

        // dd($user);
        //edit
        User::find($iduser)->update([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'address'=> $request->address,
        ]);
        ProfilUserModel::find($user->id)->update([
            'id_user'=> $user->id,
            'planing'=> 1,
            'age'=> $request->age,
            'gender'=> $request->gender,
            'weight'=> $request->weight,
            'height'=> $request->height,
            'activity'=> $request->activity,
            'exercise_activity'=> $request->exercise_activity,
        ]);

        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $mainuser = DB::table('users')->where('id', $iduser)->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();

        if($user->exercise_activity == 1){
            $exercise_activity = "Jarang";
        }elseif($user->exercise_activity == 2){
            $exercise_activity = "Jarang(1-2 kali seminggu)";
        }elseif($user->exercise_activity == 3){
            $exercise_activity = "Normal(2-3 kali seminggu)";
        }elseif($user->exercise_activity == 4){
            $exercise_activity = "Sering(4-5 kali seminggu)";
        }elseif($user->exercise_activity == 5){
            $exercise_activity = "Sangat Sering(2 kali sehari)";
        }else{
            $activity = "null";
        }
        
        if($user->activity == 1){
            $activity = "Menetap";
        }elseif($user->activity == 2){
            $activity = "Kurang Aktif";
        }elseif($user->activity == 3){
            $activity = "Aktif";
        }elseif($user->activity == 4){
            $activity = "Sangat Aktif";
        }else{
            $activity = "null";
        }

        if($user->gender == 1){
            $gender = "Laki-laki";
        }elseif($user->gender == 2){
            $gender = "Perempuan";
        }else{
            $gender = "null";
        }
        // dd($gender);

        return back()->with('success', 'Data was updated.');
    }

    public function weight(){
        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();
        return view('user.myweight',[
            'namecompany' => $namecompany,
            'profiluser' => $user,
            ]);
    }
}
