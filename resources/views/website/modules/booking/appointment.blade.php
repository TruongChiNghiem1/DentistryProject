@extends('website.master')

@section('content')
<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">Đặt lịch khám</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ asset('/') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Đặt lịch khám</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_100 section_padding_bottom_75">
    <div class="container">
        <div class="row topmargin_40">
            <div class="col-sm-4 to_animate" data-animation="pullDown">
                <div class="teaser text-center">
                    <div class="teaser_icon highlight size_normal">
                        <i class="rt-icon2-phone5"></i>
                    </div>
                    <p>
                        <span class="grey">Phone:</span> +84 859 774 418<br>
                        <span class="grey">Fax:</span> +84 859 774 418
                    </p>
                </div>
            </div>
            <div class="col-sm-4 to_animate" data-animation="pullDown">
                <div class="teaser text-center">
                    <div class="teaser_icon highlight size_normal">
                        <i class="rt-icon2-location2"></i>
                    </div>
                    <p> 
                        607 Tân sơn<br>
                        phường 12<br>
                        quận Gò Vấp, Tp. Hồ Chí Minh
                    </p>
                </div>
            </div>
            <div class="col-sm-4 to_animate" data-animation="pullDown">
                <div class="teaser text-center">
                    <div class="teaser_icon highlight size_normal">
                        <i class="rt-icon2-mail"></i>
                    </div>
                    {{-- <p><a href="dentistrychinghiem@gmail.com">[email&#160;protected]</a></p> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 to_animate">
                <form class="row columns_padding_5" method="post" action="">
                    @csrf
                    <div class="row columns_padding_5">
                        @if (Session::get('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>
                        @endif
                        <div class="col-sm-12">
                            <p class="contact-form-name">
                                <label for="name">Họ và tên<span class="required">*</span></label>
                                <input type="text" aria-required="true" size="30" value="{{ old('name', $users->name) }}" name="name" id="name" class="form-control" placeholder="Full Name">
                                @if ($errors->has('name'))
                                    <p class="help is-danger text-left text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </p>
                            <p class="contact-form-email">
                                <label for="email">Email address<span class="required">*</span></label>
                                <input type="email" aria-required="true" size="30" value="{{ old('email', $users->email) }}" name="email" id="email" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    <p class="help is-danger text-left text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </p>
                            

                        </div>
                        <div class="col-sm-12">
                            <p class="contact-form-subject">
                                <label for="subject">Số điện thoại<span class="required">*</span></label>
                                <input type="text" aria-required="true" size="30" value="{{ old('phone', $users->phone) }}" name="phone" id="phone" class="form-control" placeholder="phone">
                                @if ($errors->has('phone'))
                                    <p class="help is-danger text-left text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </p>
                        </div>
                            
                        <div class="col-sm-12">
                            <div class="contact-form-subject">
                                <div>
                                    <label for="subject">Vui lòng chọn dịch vụ<span class="required">*</span></label>
                                </div>
                                <select name="services_id" class="form-control"  >
                                    <option selected disabled="disable">--Chọn dịch vụ--</option>
                                    @foreach ($services as $sv)
                                        @if($sv->hidden == 2)
                                            <option value="{{ $sv->id }}" >{{ $sv->services_name }}</option>
                                        @endif
                                    @endforeach
                                        @if ($errors->has('services_id'))
                                            <p class="help is-danger text-left text-danger">{{ $errors->first('services_id') }}</p>
                                        @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="contact-form-subject">
                                <div>
                                    <label for="subject">Vui lòng chọn bác sĩ điều trị<span class="required">*</span></label>
                                </div>
                                <select class="form-control" id="" name="doctors_id">
                                    <option selected disabled="disable">--Chọn dịch vụ--</option>
                                </select>
                                @if ($errors->has('doctors_id'))
                                    <p class="help is-danger text-left text-danger">{{ $errors->first('doctors_id') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="contact-form-subject">
                                <div>
                                    <label for="subject">Chọn ngày khám<span class="required">*</span></label>
                                </div>
                                <div>
                                    <select name="booking_date" class="form-control"  >
                                        <option selected disabled="disable">-- Chọn bác sĩ --</option>
                                    </select>
                                    @if ($errors->has('booking_date'))
                                        <p class="help is-danger text-left text-danger">{{ $errors->first('booking_date') }}</p>
                                    @endif
                                    @if ($errors->has('booking_date'))
                                        <p class="help is-danger text-left text-danger">{{ $errors->first('booking_date') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <p class="contact-form-message">
                                <div>
                                    <label for="subject">Ghi chú</label>
                                </div>
                                <textarea rows="9" cols="45" name="message" id="message" class="form-control" placeholder="Message" value="{{ old('message') }}"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="row columns_padding_5">
                        <div class="col-sm-12">
                            <p class=" text-center topmargin_30">
                                <button type="submit" class="theme_button color1">Đặt ngay</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="js/compressed.js"></script>
<script src="js/main.js"></script>
<script src="js/switcher.js"></script>
@endsection