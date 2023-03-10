<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Website\WbaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\Information\BookingRequest;
use Mail;
use App\Mail\Advisemail;
use Illuminate\Support\Str;
use App\Http\Requests\Information\AppointmentRequest;



class WbookingController extends WbaseController
{
    public function booking (){

        $data['services'] = DB::table('services')->get();
        return view('website.modules.booking.index',$data);
    }

    public function postbooking (BookingRequest $request){
        $data = $request->except('_token');
        $data['uuid'] = Str::uuid();
        $data['created_at'] = new \DateTime();
        
        $data['booking_type'] = 2;// 2. Lich tu van
        $data['name'] = $this->check_input($request->name);
        $data['phone'] = $this->check_input($request->phone);
        $data['email'] = $this->check_input($request->email);
        $data['message'] = $this->check_input($request->message);
        
        // if($data->confirm != null){
        //     if($data->booking_type == 2){
        //         $request->session()->regenerate();
        //         return redirect()->route('website.index');
        //     }
        //     return redirect()->royte('website.index');
        // } else {
        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();

        //     return redirect()->route('postbooking');
        // }
        $result = DB::table('booking')->insert($data);
        
        

        if ($result){
            Mail::to($request->email)->send(new Advisemail($data));

            return view('website.modules.booking.active_mail');
        }
        //calendar
        return view('website.modules.booking.active_mail');
    }

    public function verify_advise($uuid)
        {
            $data =DB::table('booking')->where('uuid', $uuid)->first();

            if($data->email_verified_at == null){
                DB::table('booking')->where('uuid', $uuid)->update(['email_verified_at' => new \DateTime()]);
        
                return view('website.modules.booking.advise_mail');
            }else {
                return redirect()->route('website.index');
            }
    }

    public function getappointment ($id){
        $data['services'] = DB::table('services')->orderBy('id')->get();
        $data['services_doctor'] = DB::table('services_doctor')->orderBy('id')->get();
        $data['doctors'] = DB::table('doctors')->orderBy('id')->get();
        $data['users'] = DB::table('users')->where('uuid', $id)->first();
        return view('website.modules.booking.appointment',$data);
    }

    public function postappointment (AppointmentRequest $request,$id){
        $data = $request->except('_token','success');
        $data['uuid'] = Str::uuid();
        $data['email_verified_at'] = new \DateTime();
        $data['booking_date'] = $request->booking_date;
        $data['created_at'] = new \DateTime();
        $data['booking_type'] = 1;// 1. Lich Kham
        $data['name'] = $this->check_input($request->name);
        $data['phone'] = $this->check_input($request->phone);
        $data['email'] = $this->check_input($request->email);
        $data['message'] = $this->check_input($request->message);
        DB::table('booking')->insert($data);
        
        //calendar
        $data1 = $request->except('_token', 'booking_type','email','booking_date','message','services_id','doctors_id');
        $data1['calendar_type'] = 3;
        $data1['uuid'] = $id;
        $data1['day_time'] = $request->booking_date;
        DB::table('calendars')->insert($data1);
            
        return view('website.modules.booking.mail_appointment');
        return redirect()->route('website.index');
    }

    public function fetchDoctor(Request $request){
        //$services_doctor = DB::table('services_doctor')->orderBy('id')->get();
        $services_id = $request->services_id;
        $doctor = DB::table('doctors')
                    ->join('services_doctor',"services_doctor.doctors_id", "=", "doctors.id")
                    ->where('services_doctor.services_id',$services_id)
                    ->get();
            echo "<option selected disabled='disabled'>--Chọn bác sĩ--</option>";
        foreach($doctor as $dt){
            if($dt->hidden == 2){
                echo "<option value='".$dt->doctors_id."'>".$dt->doctor_name."</option>";
            }
        }
    }

    public function fetchWorktime(Request $request){
        $doctor_id = $request->doctors_id;
        $doctor = DB::table('doctors')
                     ->where('id',$doctor_id)
                     ->first();

        $startdate = strtotime("now");
        $enddate = strtotime("+1 months");
        $array = explode(',', $doctor->worktime);
        while ($startdate < $enddate) {
            foreach($array as $arr){ 
                if(date('D', $startdate) == $arr) {
                    echo "<option value='".date("Y-m-d", $startdate)."'>" . date("d/m/Y", $startdate) . "</option>";
                }
            }
            $startdate = strtotime("+1 day", $startdate);
        }
    }


    
}