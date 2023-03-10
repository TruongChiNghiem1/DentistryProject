@extends('admin.master')

@section('content')
<form action="{{ route('admin.information.patients.store') }}" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Điền thông tin cá nhân</h3>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh bệnh nhân</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Họ và tên</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label" for="exampleFormControlInput1">Giới tính</label>
        
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                        <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Nam</option>
                                        <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <label class="form-label" for="exampleFormControlInput1" >Số điện thoại</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-5" >
                                <label class="form-label" for="exampleFormControlInput1">Dân tộc</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="ethnic" value="{{ old('ethnic') }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="address" value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="input_wrap common_date_picker mb_20">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày sinh</label>
                                    <input type="date" class="input_form" id="start_datepicker" placeholder="Pick a start date" name="birth" value="{{ old('birth') }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Nghề nghiệp</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="job" value="{{ old('job') }}">
                                </div>
                            </div>
                            <div class="col-lg-5" >
                                <label class="form-label" for="exampleFormControlInput1">Nơi làm việc</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="job_adress" value="{{ old('job_adress') }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Người giám hộ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="relative_name" value="{{ old('relative_name') }}">
                                </div>
                            </div>
                            <div class="col-lg-5" >
                                <label class="form-label" for="exampleFormControlInput1">Số điện thoại người giám hộ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="relative_phone" value="{{ old('relative_phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Địa chỉ người giám hộ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="relative_address" value="{{ old('relative_address') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Điền thông tin bệnh án</h3>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <div class="input_wrap common_date_picker mb_20">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày khám</label>
                                    <input type="date" class="input_form" id="start_datepicker" placeholder="Pick a start date" name="medical_examination_day" value="{{ old('medical_examination_day') }}">
                                </div>
                            </div>
                            {{-- <div class="col-lg-5">
                                <div class="input_wrap common_date_picker mb_20">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày tái khám</label>
                                    <input type="date" class="input_form" id="start_datepicker" placeholder="Pick a start date" name="re-examination_date">
                                </div>
                            </div> --}}
                        </div>
                        
                        <div>
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Lý do đến bệnh viện</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="reason" value="{{ old('reason') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <label class="form-label" for="exampleFormControlInput1">Dịch vụ khám bệnh</label>
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" name="services_id">
                                        <option selected disabled="disable">--Chọn dịch vụ--</option>
                                        @foreach ($services as $sv)
                                            @if($sv->hidden == 2)
                                                <option value="{{ $sv->id }}" >{{ $sv->services_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label" for="exampleFormControlInput1">Bác sĩ phụ trách</label>
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="doctors_id">
                                        <option selected disabled="disable">--Chọn dịch vụ--</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Chuẩn đoán</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="diagnosis" value="{{ old('diagnosis') }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Tóm tắt bệnh án</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="medical_summary" value="{{ old('medical_summary') }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</form>
@endsection