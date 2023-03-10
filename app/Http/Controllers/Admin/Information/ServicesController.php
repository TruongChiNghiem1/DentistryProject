<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Information\ServicesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesController extends BaseController
{
    public function __construct(){
        parent::__construct('information','services');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services'] = $this->db->orderby('id','DESC')->get();
        return $this->view_admin('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_admin('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)
    {
        $data = $request->except('_token');
        $data['uuid'] = Str::uuid();
        //$data1['services_id'] = $data['uuid'];
        $data['created_at'] = new \DateTime();
        

        $imagesName = time() . '_' . $request->images->getClientOriginalName();
        $request->images->move(public_path('images'), $imagesName);
        $data['images'] = $imagesName;
        //DB::table('services_doctor')->insert($data1);
        $this->db->insert($data);
        return $this->route_admin('index', [], ['success' => 'Thêm dịch vụ thành công']);
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
        $services = $this->db->where('uuid', $id);

        if ($services->exists()) {
            $data['services'] = $services->first();
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
    public function update(ServicesRequest $request, $id)
    {
        $services_current = $this->db->where('uuid', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();


        if (empty($request->images)) {
            $data['images'] = $services_current->images; 
        } else {
            $image_path = public_path('images') . "/" . $services_current->images;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->images->getClientOriginalName();  
            $request->images->move(public_path('images'), $imageName);
            $data['images'] = $imageName;
        }

        $this->db->where('uuid', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa dịch vụ thành công']);
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
        return $this->route_admin('index', [] ,['success' => 'Ẩn dịch vụ thành công']);
    }
}
