<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WpatientsController extends Controller
{
    public function getwpatient($id){
        $data['users'] = DB::table('users')->where('uuid', $id)->first();
        //CHạy for
        $data['now'] = Carbon::now()->year;
        $data['lichSu'] = DB::table('history')->orderBy('id')->where('uuid', $id)->get();
        $data['patient'] = DB::table('patients')
                            // ->join('services', 'services.services_id', '=', 'patients.id')
                            // ->join('doctors', 'doctors.doctors_id', '=', 'patients.id')
                            ->where('uuid', $id)->first();
        return view('website.modules.patients.index', $data);
    }
}
