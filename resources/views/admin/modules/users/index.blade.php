@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Nhân viên nha khoa</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('admin.users.create') }}" class="btn_1">Tạo tài khoản nhân viên</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table id="my_table" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh đại diện</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Cấp bậc</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $tk)
                                    <tr>
                                        @php
                                            $avatar = !empty($tk->avatar) ? $tk->avatar : 'default.png';   
                                        @endphp

                                        <th scope="row"><img src="{{ asset('avatar/'.$avatar) }}" width="50px"></th>
                                        <td>{{ $tk->name }}</td>
                                        <td>{{ $tk->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                                        <td>{{ $tk->phone }}</td>
                                        <td>{{ $tk->email }}</td>
                                        <td><a href="#" class="status_btn"> 
                                            @switch($tk->level)
                                                @case (4) Super Admin
                                                        @break
                                                @case (1) Admin
                                                        @break
                                                @case (2) Điều dưỡng
                                                        @break
                                            @endswitch
                                            </a></td>
                                        <td><a href="{{ route('admin.users.edit',['uuid' => $tk->uuid]) }}"><i class="fa-solid fa-pen-to-square"></i></td>
                                        <td><a href="{{ route('admin.users.destroy',['uuid' => $tk->uuid]) }}" onclick="return confirm('Bạn có muốn xóa tài khoản này?');"><i class="fa-solid fa-delete-left color-red"></i></td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection