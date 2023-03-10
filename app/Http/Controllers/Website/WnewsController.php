<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WnewsController extends Controller
{
    public function news (){
        $data['news'] = DB::table('news')->orderby('id','DESC')->get();
        return view('website.modules.news.index',$data);
    }

    public function newsdetail ($id){
        $news = DB::table('news')->where('uuid', $id);
        
        if ($news->exists()) {
            $data['news'] = $news->first();
            $data['news2'] = DB::table('news')->get();
            return view('website.modules.news.newsdetail',$data);
        } else {
            abort(404);
        }
    }
}
