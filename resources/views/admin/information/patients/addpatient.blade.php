@extends('admin.master')

@section('content')
<form action="" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Thêm thông tin bệnh án</h3>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <div class="input_wrap common_date_picker mb_20">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày khám</label>
                                    <input type="date" class="input_form" id="start_datepicker" placeholder="Pick a start date" name="medical_examination_day">
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
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="reason" value={{ old('reason') }}>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <label class="form-label" for="exampleFormControlInput1">Dịch vụ khám bệnh</label>
                                <div class="input-group input-group-sm mb-3">
                                    <select class="form-control" id="exampleFormControlSelect1" name="services_id">
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
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="diagnosis" value={{ old('diagnosis') }}>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Tóm tắt bệnh án</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="medical_summary" value={{ old('medical_summary') }}>
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