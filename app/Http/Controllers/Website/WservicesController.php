<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WservicesController extends Controller
{
    public function services (){
        $data['services'] = DB::table('services')->orderby('id','DESC')->get();
        return view('website.modules.services.index',$data);
    }

    public function detail ($id){
        $services = DB::table('services')->where('uuid',$id);

        if($services->exists()){
            $data['service'] = $services->first();
            return view('website.modules.services.detail',$data);
        } else {
            abort(404);
        }
        return view('website.modules.services.detail');
    }
}
