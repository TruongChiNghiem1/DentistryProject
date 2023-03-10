<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Information\PatientsRequest;
use App\Http\Requests\Information\AddpatientRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PatientsController extends BaseController
{
    public function __construct(){
        parent::__construct('information','patients');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1['users'] = DB::table('users')->where('level', 3)->orderby('id','DESC')->get();
        return $this->view_admin('index', $data1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['patients'] = DB::table('patients')->get();
        $data['services_doctor'] = DB::table('services_doctor')->get();
        $data['doctors'] = DB::table('doctors')->get();
        $data['services'] = DB::table('services')->get();
        
        return $this->view_admin('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Thêm
    public function store(PatientsRequest $request)
    {
        // #-------------------------------User--------------------------------#
        $data = $request->except('_token', 'medical_examination_day', 'reason', 'services_id', 'doctors_id', 'diagnosis', 'medical_summary');
        $data['uuid'] =  Str::uuid();
        $data['created_at'] = new \DateTime();

        $data['password'] = bcrypt('12345678');
        // $data['examination_date'] = Carbon::createFromFormat('Y-m-d', $data['examination_date'])->format('Y-m-d');
        
        if(!empty($request->avatar)){
            $avatarName = time() . '_' . $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('avatar'), $avatarName);
            $data['avatar'] = $avatarName;
        }
        $data['birth'] = Carbon::createFromFormat('Y-m-d', $request->birth)->format('Y-m-d');
        $data['online'] = 1;
        //$data['patients'] = $request->DB::table('patients');

        DB::table('users')->insert($data);


        // #-------------------------------Patients----------------------------------#
        $data2 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address');
        $data2['uuid'] = $data['uuid'];
        $data2['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        $data2['created_at'] = new \DateTime();

        DB::table('patients')->insert($data2);



        // #-------------------------------history--------------------------------------#
        $dt_id = $request->doctors_id;
        $sv_id = $request->services_id;
        $data3 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address', 'services_id', 'doctors_id');
        $data3['uuid'] = $data['uuid'];

        $dt_h = DB::table('doctors')->where('id',$dt_id)->first();
        $data3['doctors_name'] = $dt_h->doctor_name;

        $sv_h = DB::table('services')->where('id',$sv_id)->first();
        $data3['services_name'] = $sv_h->services_name;

        $data3['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        $data3['created_at'] = new \DateTime();

        DB::table('history')->insert($data3);


        
        //#-------------------------------calendar--------------------------------------#
        $data4 = $request->except('_token', 'email', 'avatar', 'gender','services_id', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address', 'reason', 'diagnosis', 'medical_summary', 'medical_examination_day', 'services_id', 'doctors_id');
        $data4['uuid'] = $data['uuid'];
        $data4['calendar_type'] = 3;//lich Khám 
        $data4['day_time'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        $data4['created_at'] = new \DateTime();
        
        DB::table('calendars')->insert($data4);

        return $this->route_admin('index', [], ['success' => 'Thêm hồ sơ bệnh nhân thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function fetchDoctor(Request $request){
        //$services_doctor = DB::table('services_doctor')->orderBy('id')->get();
        $services_id = $request->services_id;
        
        $doctor = DB::table('doctors')->join('services_doctor',"services_doctor.doctors_id", "=", "doctors.id")->where('services_doctor.services_id',$services_id)->get();
            echo "<option selected disabled='disabled'>--Chọn bác sĩ--</option>";
        foreach($doctor as $dt){
            if($dt->hidden == 2){
                echo "<option value='".$dt->doctors_id."'>".$dt->doctor_name."</option>";
            }
        }
    }

    public function show($id)
    {
        
        // $data['patients'] = DB::table('patients')
        //                     ->select('patients.*','services.services_name as services_name', 'doctors.doctor_name as doctors_name')
        //                     ->join('services', 'patients.services_id', '=', 'services.id')
        //                     ->join('doctors', 'patients.doctors_id', '=', 'doctors.id')
        //                     ->where('uuid', $id)
        //                     ->first();
        $data['patient'] = DB::table('patients')->where('uuid', $id)->first();
        $data['users'] = DB::table('users')->where('uuid', $id)->first();
        $data['lichSu'] = DB::table('history')->where('uuid', $id)->get();
        $data['now'] = Carbon::now()->year;
        // $data['patient'] = DB::table('patients')
                            // ->join('services', 'services.services_id', '=', 'patients.id')
                            // ->join('doctors', 'doctors.doctors_id', '=', 'patients.id')
                            // ->where('uuid', $id)->first();
        return view('admin.information.patients.show', $data);
    }

    //Thêm bệnh án
    public function addpatient($id)
    {
        $data['patients'] = DB::table('patients')->get();
        $data['services_doctor'] = DB::table('services_doctor')->get();
        $data['doctors'] = DB::table('doctors')->get();
        $data['services'] = DB::table('services')->get();
        $data['lichSu'] = DB::table('history')->where('uuid', $id)->get();
        return view('admin.information.patients.addpatient', $data);
    }

    public function addpostpatient(AddpatientRequest $request, $id)
    {
        //Cập nhật lại bệnh án Patients
        $data2 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address');
        $data2['uuid'] = $request->uuid;
        $data2['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        $data2['created_at'] = new \DateTime();

        DB::table('patients')->where('uuid',$id)->update($data2);


        // ---------------------------------history-------------------------------------
        //Thêm bệnh án mới vào lịch sử
        $dt_id = $request->doctors_id;
        $sv_id = $request->services_id;
        $data3 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address', 'services_id', 'doctors_id');
        $data3['uuid'] = $request->uuid;

        $dt_h = DB::table('doctors')->where('id',$dt_id)->first();
        $data3['doctors_name'] = $dt_h->doctor_name;

        $sv_h = DB::table('services')->where('id',$sv_id)->first();
        $data3['services_name'] = $sv_h->services_name;

        $data3['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        $data3['created_at'] = new \DateTime();

        DB::table('history')->where('uuid',$id)->insert($data3);

        return $this->route_admin('index', [], ['success' => 'Thêm bệnh án thành công']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = $this->db->where('uuid', $id);
        if ($patients->exists()) {
            $data['users'] = DB::table('users')->where('uuid', $id)->first();
            $data['services_doctor'] = DB::table('services_doctor')->get();
            $data['doctors'] = DB::table('doctors')->get();
            $data['services'] = DB::table('services')->get();
            $data['patients'] = $patients->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientsRequest $request, $id)
    {
        // dd($request);
        // -------------------------------User--------------------------------
        $users_current = DB::table('users')->where('uuid', $id)->first();
        $data = $request->except('_token', 'medical_examination_day', 'reason', 'services_id', 'doctors_id', 'diagnosis', 'medical_summary');
        $data['created_at'] = new \DateTime();
        // $data['examination_date'] = Carbon::createFromFormat('Y-m-d', $data['examination_date'])->format('Y-m-d');
        

         if (empty($request->avatar)){
            $data['avatar'] = $users_current->avatar;
        } else{
            if(empty($users_current->avatar)){
                $avatarName = time() . '_' . $request->avatar->getClientOriginalName();
                $request->avatar->move(public_path('avatar'), $avatarName);
                $data['avatar'] = $avatarName;
            } else {
                $avatar_path = public_path('avatar') . "/" . $users_current->avatar;
                if (file_exists($avatar_path)) {
                    unlink($avatar_path);
                }
                $avatarName = time() . '_' . $request->avatar->getClientOriginalName();
                $request->avatar->move(public_path('avatar'), $avatarName);
                $data['avatar'] = $avatarName;
            }
        }
        $data['birth'] = Carbon::createFromFormat('Y-m-d', $request->birth)->format('Y-m-d');
        //$data['patients'] = $request->DB::table('patients');

        DB::table('users')->where('uuid', $id)->update($data);


        // -------------------------------Patients--------------------------------------
        $patients_current = $this->db->where('uuid', $id)->first();
        $data2 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address');
        if(!empty($request->medical_examination_day)){
            $data2['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        }
        $data2['created_at'] = new \DateTime();

        DB::table('patients')->where('uuid',$id)->update($data2);


        // -------------------------------history-----------------------------------------
        $history_current = DB::table('history')->where('uuid', $id)->first();
        $dt_id = $request->doctors_id;
        $sv_id = $request->services_id;
        $data3 = $request->except('_token', 'name', 'email', 'phone', 'gender', 'avatar', 'ethnic', 'address', 'birth', 'job', 'job_adress', 'relative_name', 'relative_phone', 'relative_address', 'services_id', 'doctors_id');

        if(!empty($dt_id)){
            $dt_h = DB::table('doctors')->where('id',$dt_id)->first();
            $data3['doctors_name'] = $dt_h->doctor_name;
        }
        if(!empty($sv_id)){
            $sv_h = DB::table('services')->where('id',$sv_id)->first();
            $data3['services_name'] = $sv_h->services_name;
        }
        if(!empty($request->medical_examination_day)){
            $data3['medical_examination_day'] = Carbon::createFromFormat('Y-m-d', $request->medical_examination_day)->format('Y-m-d');
        }
        $data3['created_at'] = new \DateTime();

        DB::table('history')->where('uuid', $id)->update($data3);

        
        return $this->route_admin('index', [], ['success' => 'Sửa hồ sơ bệnh nhân thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = $this->db->where('uuid', $id);
        $history = DB::table('history')->where('uuid', $id);
        $users = DB::table('users')->where('uuid', $id);

        if ($users->exists()) {
            $users_current = $users->first();

            if (!empty($users_current->avatars)) {
                $avatar_path = public_path('avatars') . "/" . $users_current->avatars;
                if (file_exists($avatar_path)) {
                    unlink($avatar_path);
                }
            }

            $patients->delete();
            $history->delete();
            $users->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa bệnh nhân thành công']);
        } else {
            abort(404);
        }
    }
}


// return $services_id

//         foreach($services_doctor as $sv_dt){
//             echo "<option>$services_id</option>";

//             // if($sv_dt->doctors_id == $service_id){
//             //     foreach($doctor_id as $dt ){
//             //         if($sv_dt->doctors_id == $dt->id){
//             //             echo "<option>{{ $dt->doctor_name }}</option>";

//             //         }
//             //     }
//             // }
//         }
//         //