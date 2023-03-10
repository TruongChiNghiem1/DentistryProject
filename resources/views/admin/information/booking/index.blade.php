@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Thông tin lịch tư vấn</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('admin.information.booking.history_booking') }}" class="btn_1">Lịch sử tư vấn</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table id="my_table" class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên người đặt</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Dịch vụ</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Ngày xác nhận mail</th>
                                    <th scope="col">Không thành công</th>
                                    <th scope="col">Xác Nhận</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $tk)
                                    @if(!empty($tk->email_verified_at))
                                        @if($tk->success == 0)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tk->name }}</td>
                                                <td>{{ $tk->phone }}</td>
                                                <td>{{ $tk->email }}</td>
                                                <td>{{ $tk->services_name }}</td>
                                                <td>{{ $tk->message }}</td>
                                                <td>{{ $tk->email_verified_at }}</td>
                                                <td><a href="{{ route('admin.information.booking.destroy',['uuid' => $tk->uuid]) }}"  onclick="return confirm('Xác nhận không thành công đối với người này?');"><i class="ti-check"></i></td>
                                                <td><a href="{{ route('admin.information.booking.destroy_patient', ['uuid' => $tk->uuid]) }}"><i class="ti-check"></i></td>
                                            </tr>
                                        @endif
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