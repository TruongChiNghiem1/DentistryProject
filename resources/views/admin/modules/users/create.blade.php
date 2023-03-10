@extends('admin.master')

@section('content')
<form action="{{ route('admin.users.store') }}" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Tạo tài khoản</h3>
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
                                <label class="form-label" for="exampleFormControlInput1">Số điện thoại</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="phone" value="{{ old('phone') }}">
                                    
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
                                <label class="form-label" for="exampleFormControlInput1">Mật khẩu</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="password">
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
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Level</label>
                            <div class="input-group input-group-sm mb-3">
        
                                <select class="form-control" id="exampleFormControlSelect1" name="level">
                                    <option value="4" {{ old('level') == 4 ? 'selected' : '' }}>Super Admin</option>
                                    <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('level') == 2 ? 'selected' : '' }} selected>Điều dưỡng</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh đại diện</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="avatar">
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