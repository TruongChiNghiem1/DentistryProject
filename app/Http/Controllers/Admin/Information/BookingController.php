<?php

namespace App\Http\Controllers\Admin\Information;

use Illuminate\Http\Request;
use App\Http\Requests\Information\BookingRequest;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BookingController extends BaseController
{
    public function __construct(){
        parent::__construct('information','booking');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Hiển thị lịch tư vấn
    public function index()
    {
        $data['booking'] = $this->db->orderBy('id')->where('booking_type', 2)
            ->select('booking.*', 'services.services_name as services_name')
            ->join('services', 'booking.services_id', '=', 'services.id')
            ->get();

        return $this->view_admin('index', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Lịch sử tư vấn history_appointment
    public function history_booking(){
        $data['history_booking'] = $this->db->orderby('id','DESC')->where('booking_type', 2)
            ->select('booking.*', 'services.services_name as services_name')
            ->join('services', 'booking.services_id', '=', 'services.id')
            ->get();

        return view('admin.information.booking.history',$data);
    }


    // Lịch tư vấn thành công
    public function destroy_patient($id)
    {
        $data['success'] = 1;
        DB::table('booking')->where('uuid', $id)->update($data);
        return redirect()->route('admin.information.patients.create');
    }

    //Tư vấn không thành công
    public function destroy($id)
    {
        $data['success'] = 2;
        DB::table('booking')->where('uuid', $id)->update($data);
        return $this->route_admin('index', [] ,[]);
    }

    //Xóa lịch sử tư vấn 
    public function destroy_history($id)
    {
        $history = DB::table('booking')->where('uuid', $id);

        if ($history->exists()) {
            $history->delete();
            $data['history_booking'] = DB::table('booking')->get();
            return view('admin.information.booking.history',$data,['success' => 'Xóa lịch sử thành công']);
        } else {
            abort(404);
        }
    }

    
    //hiển thị lịch đặt
    public function appointment()
    {
        $data['booking'] = $this->db->orderBy('id')->where('booking_type', 1)
            ->select('booking.*', 'services.services_name as services_name')
            ->join('services', 'booking.services_id', '=', 'services.id')
            ->get();

        return view('admin.information.booking.appointment', $data);
    }

    //Lịch sử đặt lịch history_appointment
    public function history_appointment(){
        $data['history_booking'] = $this->db->orderby('id','DESC')->where('booking_type', 1)
            ->select('booking.*', 'services.services_name as services_name')
            ->join('services', 'booking.services_id', '=', 'services.id')
            ->get();

        return view('admin.information.booking.history_appointment',$data);
    }

    // Đặt lịch thành công
    public function success_appointment ($id)
    {
        $data['success'] = 1;
        
        DB::table('booking')->where('uuid', $id)->update($data);
        return $this->route_admin('appointment', [] ,[]);
    }

    //Đặt lịch không thành công
    public function not_success_appointment($id)
    {
        $data['success'] = 2;
        DB::table('booking')->where('uuid', $id)->update($data);
        return $this->route_admin('appointment', [] ,[]);
    }

    //Xóa lịch sử đặt lịch 
    public function destroy_history_appointment($id)
    {
        $history = DB::table('booking')->where('uuid', $id);

        if ($history->exists()) {
            $history->delete();
            $data['history_booking'] = DB::table('booking')->get();
            return view('admin.information.booking.history_appointment',$data,['success' => 'Xóa lịch sử thành công']);
        } else {
            abort(404);
        }
    }

    
    

    
}
