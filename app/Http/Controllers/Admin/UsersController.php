<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Str;
use  App\Http\Requests\UserRequest;

class UsersController extends BaseController
{
    public function __construct(){
        parent::__construct([],'users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->db->where('level', '!=', 3)->orderby('id','DESC')->get();
        //return $this->view_admin('index', $data);
        //$userindex = DB::table('users')->orderBy('id')->get();
        //dd($userindex);
        return $this->view_admin('index',$data);
        
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
    public function store(UserRequest $request)
    {
        // $data = $request->except('_token');
        // $data['created_at'] = new \DateTime();
        // DB::table('users')->insert($data);
        $data = $request->except('_token');
        $data['uuid'] = Str::uuid();

        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();

        if(!empty($request->avatar)){
            $avatarName = time() . '_' . $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('avatar'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        $this->db->insert($data);

        return $this->route_admin('index', [], ['success' => 'Thêm tài khoảng nhân viên thành công']);
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
        $users = $this->db->where('uuid', $id);

        if ($users->exists()){
            $data['users'] = $users->first();
            return $this->view_admin('edit', $data);
        } else{
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
    public function update(UserRequest $request, $id)
    {
        $user_current = $this->db->where('uuid', $id)->first();
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

        if (empty($request->password)) {
            $data['password'] = $user_current->password; 
        } else {
            $request->validate([
                'password' => 'min:7'
            ], [
                'password.min' => 'Mật khẩu ít nhất 7 ký tự'
            ]);

            $data['password'] = bcrypt($request->password);
        }

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

        $this->db->where('uuid', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa tài khoảng nhân viên thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->db->where('uuid', $id);

        if ($user->exists()) {
            $user_current = $user->first();

            if (!empty($user_current->avatar)) {
                $image_path = public_path('images') . "/" . $user_current->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $user->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa tài khoảng nhân viên thành công']);
        } else {
            abort(404);
        }
    }
}
