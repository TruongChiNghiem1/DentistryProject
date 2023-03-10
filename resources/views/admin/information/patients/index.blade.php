@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Bệnh nhân</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('admin.information.patients.create') }}" class="btn_1">Thêm bệnh nhân</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table id="my_table" class="table  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Ảnh bệnh nhân</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ngày sinh</th>
                                    {{-- <th scope="col">Email</th> --}}
                                    <th scope="col">Ngày giờ thêm</th>
                                    <th scope="col">Online</th>
                                    <th scope="col">Thêm bệnh án</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $patient)
                                    @if(!(empty($patient->email_verified_at) && $patient->online == 2))
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @php
                                                $avatar = !empty($patient->avatar) ? $patient->avatar : 'default.png';
                                            @endphp

                                            <th scope="row"><img src="{{ asset('avatar/'.$avatar) }}" width="50px"></th>
                                            <td><a href="{{ route('admin.information.patients.show',['uuid' => $patient->uuid]) }}">{{ $patient->name }}</a></td>
                                            <td>{{ $patient->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td>{{ $patient->phone }}</td>
                                            <td>{{ $patient->birth }}</td>
                                            {{-- <td>{{ $patient->email }}</td> --}}
                                            <td>{{ date('H:i d/m/Y', strtotime($patient->created_at)) }}</td>
                                            <td><a href="#" class="status_btn">{{ $patient->online == 2 ? 'Online' : 'Offline' }}</a></td>
                                            <td><a href="{{ route('admin.information.patients.addpatient',['uuid' => $patient->uuid]) }}"><i class="fa-solid fa-pen-to-square"></i></td>
                                                <td><a href="{{ route('admin.information.patients.edit',['uuid' => $patient->uuid]) }}"><i class="fa-solid fa-pen-to-square"></i></td>
                                            <td><a href="{{ route('admin.information.patients.destroy',['uuid' => $patient->uuid]) }}" onclick="return confirm('Bạn có muốn xóa bệnh nhân này?');"><i class="fa-solid fa-delete-left color-red"></i></td>
                                        </tr>
                                    @endif
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