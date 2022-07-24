<?php

namespace App\Http\Controllers;

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
        $iduser = Auth::user()->id;
        $namecompany = DB::table('abouts')->where('name', 'namecompany')->first();
        $mainuser = DB::table('users')->where('id', $iduser)->first();
        $user = DB::table('user_profil')->where('id_user', $iduser)->first();
        return view('user.mymenu',[
            'namecompany' => $namecompany,
            'mainuser' => $mainuser,
            'profiluser' => $user,
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
