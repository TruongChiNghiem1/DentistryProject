@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Lịch sử tư vấn</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('admin.information.booking.index') }}" class="btn_1">Quay về thông tin tư vấn</a>
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
                                    <th scope="col">Xác nhận</th>
                                    <th scope="col">Xóa vĩnh viễn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history_booking as $tk)
                                    @if(!empty($tk->email_verified_at))
                                        @if(!($tk->success == 0))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tk->name }}</td>
                                                <td>{{ $tk->phone }}</td>
                                                <td>{{ $tk->email }}</td>
                                                <td>{{ $tk->services_name }}</td>
                                                <td>{{ $tk->message }}</td>
                                                <td>{{ $tk->email_verified_at }}</td>
                                                <td><a href="#" class="status_btn {{ $tk->success == 2 ? 'bg-danger' : '' }} ">{{ $tk->success == 1 ? 'Thành công' : 'Không thành công' }}</a></td>
                                                <td><a href="{{ route('admin.information.booking.destroy_history',['uuid' => $tk->uuid]) }}" onclick="return confirm('Bạn có muốn xóa vĩnh viễn lịch này?');"><i class="ti-check"></i></td>
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