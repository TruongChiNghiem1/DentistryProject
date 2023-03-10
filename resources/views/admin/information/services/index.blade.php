@extends('admin.master')

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Dịch vụ</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2"><a href="{{ route('admin.information.services.create') }}" class="btn_1">Thêm dịch vụ</a></div>
                        </div>
                    </div>
                    <div class="QA_table ">
                         {{-- lms_table_active --}}
                        <table id="my_table" class="table mb_30" >
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên dịch vụ</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Bảo hành</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Ẩn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $tk)
                                    @if($tk->hidden != 1)
                                        <tr>
                                            @php
                                                $images = !empty($tk->images) ? $tk->images : 'default.png';   
                                            @endphp

                                            <th scope="row"><img src="{{ asset('images/'.$images) }}" width="50px"></th>
                                            <td>{{ $tk->services_name }}</td>
                                            <td>{{ number_format($tk->price, 0, "", ".") }}VND</td>
                                            <td>{{ $tk->insurance }}</td>
                                            <td><a href="{{ route('admin.information.services.edit',['uuid' => $tk->uuid]) }}"><i class="fa-solid fa-pen-to-square"></i></td>
                                            <td><a href="{{ route('admin.information.services.destroy',['uuid' => $tk->uuid]) }}"><i class="fa-solid fa-delete-left color-red"></i></td>
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