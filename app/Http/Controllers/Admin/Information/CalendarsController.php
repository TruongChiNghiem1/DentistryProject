<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CalendarsController extends BaseController
{
    public function __construct(){
        parent::__construct('information','calendars');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data['doctors_worktime'] = DB::table('doctors_worktime')->orderBy('id')->get();
        $data['day_time'] = date('Y-m-d'."T".'H:i:s');
        // $data['worktime'] = date('Y-m-d'."T".'H:i:s');
        $data['calendars'] = $this->db->get();
        return view('admin.information.calendars.index', $data);
        
        
        // $events = array();
        // $calendar = DB::table('calendars')->get();
        // foreach($calendar as $calendars){
        //     $events[] = [
        //         'title' => $calendars->name,
        //         'start' => $calendars->day_time,
        //         'color' => '#9267FF',
        //     ];
        // }
        // return view('admin.information.calendars.index', ['events' => $events]);

    }


}
