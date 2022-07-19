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
    public function index(){
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
        
        $iduser = Auth::user()->id;
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

        // normalisasi user
        if($user->gender == 1){
            $user->gender = 'Laki - Laki';
        }else{
            $user->gender = 'Perempuan';
        }
        
        // dd($kalkulator);
        return view('admin.userdashboard',[
            'event' => $event->name,
            'value' => $event->value,
            'kalkulator' => $kalkulator,
            'profiluser' => $user,
            ]);    
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }
    
    public function destroy($id){
        //
    }
}
