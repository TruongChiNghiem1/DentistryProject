@extends('admin.master')

@section('content')
<form action="{{ route('admin.users.update', ['uuid' => $users->uuid]) }}" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Sửa tài khoản</h3>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6" >
                                <label class="form-label" for="exampleFormControlInput1">Họ và tên</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name" value="{{ old('name', $users->name) }}">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label" for="exampleFormControlInput1">Số điện thoại</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="phone" value="{{ old('phone', $users->phone) }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email', $users->email) }}">
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
                                        <option value="1" {{ old('gender', $users->gender) == 1 ? 'selected' : '' }}>Nam</option>
                                        <option value="2" {{ old('gender', $users->gender) == 2 ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Level</label>
                            <div class="input-group input-group-sm mb-3">
        
                                <select class="form-control" id="exampleFormControlSelect1" name="level">
                                    <option value="4" {{ old('level', $users->level) == 4 ? 'selected' : '' }}>Super Admin</option>
                                    <option value="1" {{ old('level', $users->level) == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('level', $users->level) == 2 ? 'selected' : '' }}>Điều dưỡng</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh đại diện</label>
                            <div class="input-group mb-3">
                                @php
                                    $avatar = !empty($users->avatar) ? $users->avatar : 'default.jpeg';
                                @endphp
                                    <img src="{{ asset('avatar/'. $avatar) }}" alt="" width="100px">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="avatar">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
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