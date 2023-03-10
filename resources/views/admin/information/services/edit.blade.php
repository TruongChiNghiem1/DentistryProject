@extends('admin.master')

@section('content')
<form action="{{ route('admin.information.services.update', ['uuid' => $services->uuid]) }}" method="post"  enctype="multipart/form-data">
    <table>
        @csrf
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="white_box mb_30 col-lg-12">
                        <div class="box_header">
                            <div class="main-title">
                                <h3 class="mb-0">Sửa dịch vụ</h3>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Tên dịch vụ</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="services_name" value="{{ old('services_name', $services->services_name) }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Giá</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="price" value="{{ old('price', $services->price) }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Bảo hành</label>
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="insurance" value="{{ old('insurance', $services->insurance) }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12" >
                                <label class="form-label" for="exampleFormControlInput1">Mô tả</label>
                                <div class="input-group input-group-sm mb-3 d-block">
                                    <textarea type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="decription">{{ old('decription', $services->decription) }}</textarea>
                                    <script>
                                        CKEDITOR.replace( 'decription', {
                                                    filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                                                    filebrowserUploadMethod: 'form',
                                                    height: 800 
                                                })
                                    </script>
                                
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Ảnh cũ</label>
                            <div class="input-group mb-3">
                                @php
                                    $images = !empty($services->images) ? $services->images : 'default.jpeg';
                                @endphp
                                    <img src="{{ asset('images/'. $images) }}" alt="" width="100px">
                            </div>
                        </div>
                        <div>
                            <label class="form-label" for="exampleFormControlInput1">Đổi ảnh mới</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="images">
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