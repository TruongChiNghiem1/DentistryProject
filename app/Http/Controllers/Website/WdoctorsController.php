<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WdoctorsController extends Controller
{
    public function doctors (){
        $data['doctors'] = DB::table('doctors')->orderBy('id')->get();
        return view('website.modules.doctors.index',$data);
    }

    public function member ($id){
        $doctor = DB::table('doctors')->where('uuid',$id);

        if($doctor->exists()){
            $data['doctors'] = $doctor->first();
            return view('website.modules.doctors.member',$data);
        }else{
            abort(404);
        }
    }
}
