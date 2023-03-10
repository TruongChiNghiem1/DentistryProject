@extends('website.master')

@section('content')
<section class="ls ms section_padding_50">
<div class="container">
    <div class="container-fluid p-0 d-flex">
        <div class="row">
            <div class="col-lg-12">
                <div class=" mb_30">
                    <div class="box_header ">
                        <div class="main-title">
                            <h4 class="mb-0">Hồ sơ bệnh án của bạn</h4>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <div class="col-lg-6">
                            @php
                                $avatar = !empty($users->avatar) ? $users->avatar : 'default.png';
                            @endphp
                                <img src="{{ asset('avatar/'. $avatar) }}" alt="" width="200px">
                        </div>
                        <div class="col-lg-6">
                            <h4>Thông tin cá nhân</h4>
                            <h5>Họ và tên: {{ $users->name }}</h5>
                            <h5>Giới tính: {{ empty($users->birth) ? '' : ($users->gender == 1 ? 'Nam' : 'Nữ') }}</h5>
                            <h5>Dân tộc: {{ $users->ethnic }}</h5>
                            <h5>Tuổi: {{ empty($users->birth) ? '' : $now - date('Y', strtotime($users->birth))  }}</h5>
                            <h5>Ngày sinh: {{ empty($users->birth) ? '' : date('d/m/Y', strtotime($users->birth)) }}</h5>
                            <h5>Nghề nghiệp: {{ $users->job }}</h5>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <div class="col-lg-6">
                            <h4>Thông tin liên hệ</h4>
                            <h5>Số điện thoại: {{ $users->phone }}</h5>
                            <h5>Email: {{ $users->email }}</h5>
                            <h5>Địa chỉ: {{ $users->address }}</h5>
                            <h5>Nơi làm việc: {{ $users->job_adress }}</h5>
                            
                        </div>
                        <div class="col-lg-6 " >
                            <h4>Thông tin người giám hộ</h4>
                            <h5>Người giám hộ: {{ $users->relative_name }}</h5>
                            <h5>Số điện thoại: {{ $users->relative_phone }}</h5>
                            <h5>Địa chỉ: {{ $users->relative_address }}</h5>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <div class="col-lg-12 ">
                            <h4>Thông tin bệnh án</h4>
                            {{-- <h5>Bác sĩ phụ trách: {{ $patient->doctor_name }}</h5> --}}
                            <h5>Lý do đến bệnh viện: {{ empty($patient->reason) ? 'Không có dữ liệu' : $patient->reason }}</h5>
                            <h5>Chuẩn đoán: {{ empty($patient->diagnosis) ? "Không có dữ liệu" : $patient->diagnosis }}</h5>
                            {{-- <h5>Dịch vụ: {{ $patient->services_name }}</h5> --}}
                            <h5>Tóm tắt bệnh án: {{ empty($patient->medical_summary) ? 'Không có dữ liệu' : $patient->medical_summary }}</h5>
                            <h5>Ngày khám: {{ empty($patient->medical_examination_day) ? 'Không có dữ liệu' : date('d/m/Y', strtotime($patient->medical_examination_day)) }}</h5>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-between">
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                <div class="box_header ">
                                    <div class="main-title">
                                        <h4 class="mb-0">Lịch sử khám bệnh</h4>
                                    </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            {{-- <th scope="col">Dịch vụ</th> --}}
                                            <th scope="col">Chuẩn đoán</th>
                                            <th scope="col">Tóm tắt bệnh án</th>
                                            <th scope="col">Lý do đến bv</th>
                                            {{-- <th scope="col">Bác sĩ phụ trách</th> --}}
                                            <th scope="col">Ngày khám</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lichSu as $h)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            {{-- <td>{{ $h->services_name }}</td> --}}
                                            <td>{{ $h->diagnosis }}</td>
                                            <td>{{ $h->medical_summary }}</td>
                                            <td>{{ $h->reason }}</td>
                                            {{-- <td>{{ $h->doctor_name }}</td> --}}
                                            <td>{{ date('d/m/Y', strtotime($h->medical_examination_day)) }}</td>
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
    </div>
</div>
</section>
@endsection