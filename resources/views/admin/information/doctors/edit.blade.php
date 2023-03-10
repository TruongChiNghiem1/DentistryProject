@extends('admin.master')

@section('content')
<form action="{{ route('admin.information.doctors.update', ['uuid' => $doctors->uuid]) }}" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Sửa thông tin bác sĩ</h3>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh cũ</label>
                            <div class="input-group mb-3">
                                @php
                                    $avatar = !empty($doctors->avatar) ? $doctors->avatar : 'default.jpeg';
                                @endphp
                                    <img src="{{ asset('avatar/'. $avatar) }}" alt="" width="100px">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh đại diện</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Họ và tên</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="doctor_name" value="{{ old('doctor_name', $doctors->doctor_name) }}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label" for="exampleFormControlInput1">Giới tính</label>
        
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                        <option value="1" {{ old('gender', $doctors->gender) == 1 ? 'selected' : '' }}>Nam</option>
                                        <option value="2" {{ old('gender', $doctors->gender) == 2 ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input_wrap common_date_picker mb_20">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày sinh</label>
                                    <input class="input_form" id="start_datepicker" type="date" placeholder="Pick a start date" name="doctor_birth" value="{{ old('doctor_birth', $doctors->doctor_birth) }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <label class="form-label" for="exampleFormControlInput1">Số điện thoại</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="doctor_phone" value="{{ old('doctor_phone', $doctors->doctor_phone) }}">
                                    
                                </div>
                            </div>
                            <div class="col-lg-2" >
                                <label class="form-label" for="exampleFormControlInput1">Dân tộc</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="ethnic" value="{{ old('ethnic', $doctors->ethnic) }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label" for="exampleFormControlInput1">Chức vụ</label>
        
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="position">
                                        <option value="1" {{ old('position', $doctors->position) == 1 ? 'selected' : '' }}>Tiến sĩ</option>
                                        <option value="2" {{ old('position', $doctors->position) == 2 ? 'selected' : '' }}>Thạc sĩ</option>
                                        <option value="3" {{ old('position', $doctors->position) == 3 ? 'selected' : '' }}>Bác sĩ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email', $doctors->email) }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="address"  value="{{ old('address', $doctors->address) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="exampleFormControlInput1">Chuyên môn</label>
                        </div>
                        <div class="d-flex justify-content-between" >
                            @foreach ($services as $sv)
                                <div class="mb_30" role="group"  aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" class="btn-check" name="services_id[]" id="btncheck{{ $loop->iteration }}" autocomplete="off" value="{{ $sv->id }}">
                                    <label class="btn btn-outline-secondary" for="btncheck{{ $loop->iteration }}">{{ $sv->services_name }}</label>
                                </div>
                            @endforeach
                        </div>
                        

                        <div class="col-lg-6">
                            <label class="form-label" for="exampleFormControlInput1">Thời gian làm việc</label>
                        </div>
                        <div class="d-flex justify-content-between">
                            
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck999" autocomplete="off" value="Mon" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck999">Thứ 2</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1000" autocomplete="off" value="Tue" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1000">Thứ 3</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1111" autocomplete="off" value="Wed" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1111">Thứ 4</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1222" autocomplete="off" value="Thu" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1222">Thứ 5</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1333" autocomplete="off" value="Fri" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1333">Thứ 6</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1444" autocomplete="off" value="Sat" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1444">Thứ 7</label>
                            </div>
                            <div class="mb_30" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1555" autocomplete="off" value="Sun" name="worktime[]">
                                <label class="btn btn-outline-secondary" for="btncheck1555">Chủ nhật</label>
                            </div>
                        </div>

                        <div class="col-lg-24">
                            <label class="form-label" for="exampleFormControlInput1">Mô tả</label>
                            <div class="input-group input-group-sm mb-3 d-block">
                                <textarea type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="decription">{{ old('decription', $doctors->decription) }}</textarea>
                                <script>
                                CKEDITOR.replace('decription', {
                                    filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                                    filebrowserUploadMethod: 'form',
                                    height: 800 
                                })
                                </script>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Sửa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</form>
@endsection