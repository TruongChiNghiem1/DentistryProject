<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WhomeController extends Controller
{
    public function index (){
        $data['services'] = DB::table('services')->orderBy('id')->get();
        $data['news'] = DB::table('news')->orderBy('id')->get();
        return view('website.modules.home.index',$data);
    }
}
