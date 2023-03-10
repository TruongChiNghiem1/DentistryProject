<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Requests\Information\DoctorsRequest;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DoctorsController extends BaseController
{
    public function __construct(){
        parent::__construct('information','doctors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services_table'] = DB::table('services')->get();
        $data['services_doctor'] = DB::table('services_doctor')->get();
        $data['doctors_worktime'] = DB::table('doctors_worktime')->get();
        $data['doctors'] = $this->db->orderby('id','DESC')->get();
        return $this->view_admin('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['services'] = DB::table('services')->get();

        return $this->view_admin('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorsRequest $request)
    {
        $data = $request->except('_token','services_id');

        $data['uuid'] = Str::uuid();
        $data['created_at'] = new \DateTime();
        $day = $request->doctor_birth;
        $data['doctor_birth'] = Carbon::createFromFormat('Y-m-d', $day)->format('Y-m-d');

        $worktimes = $request->worktime;
        $data['worktime'] = implode(',', $worktimes);

        if(!empty($request->avatar)){
            $avatarName = time() . '_' . $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('avatar'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        $doctor = $this->db->insertGetId($data);
        foreach($request->services_id as $services_id)
        {
            DB::table('services_doctor')->insert([
                'doctors_id'=>$doctor,
                'services_id'=>$services_id
            ]);
        }

        //calendar
        foreach($request->worktime as $wt){
            // $data['day_time'] = 
        }


        // foreach($request->worktime as $worktime)
        // {
        //     DB::table('doctors_worktime')->insert([
        //         'doctors_id'=>$doctor,
        //         'worktime'=>$worktime
        //     ]);
        // }
        
        return $this->route_admin('index', [], ['success' => 'Thêm bác sĩ thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = $this->db->where('uuid', $id);
        $data['services'] = DB::table('services')->get();
        if ($doctors->exists()) {
            $data['doctors'] = $doctors->first();
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
    public function update(DoctorsRequest $request, $id)
    {
        $doctors_current = $this->db->where('uuid', $id)->first();

        $data = $request->except('_token','services_id');
        $data['updated_at'] = new \DateTime();

        $day = $request->doctor_birth;
        $data['doctor_birth'] = Carbon::createFromFormat('Y-m-d', $day)->format('Y-m-d');

        $worktimes = $request->worktime;
        $data['worktime'] = implode(', ', $worktimes);

        if (empty($request->avatar)) {
            $data['avatar'] = $doctors_current->avatar; 
        } else {
            $avatar_path = public_path('avatar') . "/" . $doctors_current->avatar;
            if (file_exists($avatar_path)) {
                unlink($avatar_path);
            }
            $avatarName = time().'-'.$request->avatar->getClientOriginalName();  
            $request->avatar->move(public_path('avatar'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        $doctor = $this->db->where('uuid', $id)->update($data);

        $doctor2 = $this->db->where('uuid', $id)->first();
        $services_doctor = DB::table('services_doctor')->where('doctors_id',$doctor2->id)->delete();
        
        foreach($request->services_id as $services_id)
        {
            DB::table('services_doctor')->insert([
                'doctors_id'=>$doctor2->id,
                'services_id'=>$services_id
            ]);
        }

        return $this->route_admin('index', [] ,['success' => 'Sửa bác sĩ thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->db->where('uuid', $id)->update(['hidden' => 1]);
        return $this->route_admin('index', [] ,['success' => 'Ẩn bác sĩ thành công']);
        
    }
}
