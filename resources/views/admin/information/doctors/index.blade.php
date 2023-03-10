@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Thông tin bác sĩ</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('admin.information.doctors.create') }}" class="btn_1">Thêm bác sĩ</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table id="my_table" class="table">
                            <thead> 
                                <tr>
                                    <th scope="col">Ảnh đại diện</th>
                                    <th scope="col">Tên bác sĩ</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Chuyên môn</th>
                                    <th scope="col">Thời gian làm việc</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Ẩn</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($doctors as $tk)
                                    @if($tk->hidden != 1)
                                        <tr>
                                            @php
                                                $avatar = !empty($tk->avatar) ? $tk->avatar : 'default.png';   
                                            @endphp

                                            <th scope="row"><img src="{{ asset('avatar/'.$avatar) }}" width="50px"></th>
                                            <td>{{ $tk->doctor_name }}</td>
                                            <td>{{ $tk->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                                            <td>{{ $tk->doctor_phone }}</td>
                                            <td>{{ $tk->email }}</td>
                                            <td>
                                                @foreach ($services_doctor as $sv_dt) 
                                                    @if ($sv_dt->doctors_id == $tk->id)
                                                        @foreach($services_table as $sv_tb)
                                                            {{ $sv_dt->services_id == $sv_tb->id ? "$sv_tb->services_name" : '' }}
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>   
                                            <td>
                                                @foreach ($doctors_worktime as $wt)
                                                    @if($wt->doctors_id == $tk->id)
                                                        @if($wt->worktime == 8)
                                                        Chủ nhật
                                                        @else
                                                        Thứ {{ $wt->worktime }},
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            @switch($tk->position)
                                                @case(1)
                                                    <td>Tiến sĩ</td>
                                                    @break
                                                @case(2)
                                                    <td>Thạc sĩ</td>
                                                    @break
                                                @default
                                                    <td>Bác sĩ</td>
                                                @endswitch
                                                
                                                {{-- {{ if($tk->position == 1){
                                                        'Tiến sĩ'
                                                    } else if ($tk->position == 2){
                                                        'Thạc sĩ'
                                                    } else {
                                                        'Bác sĩ'
                                                    } }} --}}
                                                    
                                                    
                                            <td><a href="{{ route('admin.information.doctors.edit',['uuid' => $tk->uuid]) }}"><i class="fa-solid fa-pen-to-square"></i></td>
                                            <td><a href="{{ route('admin.information.doctors.destroy',['uuid' => $tk->uuid]) }}"><i class="fa-solid fa-delete-left color-red"></i></td>
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