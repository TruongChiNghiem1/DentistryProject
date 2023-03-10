@extends('website.master')

@section('content')
<section class="ls section_padding_110">
    <div class="container">
        <div class="row bottommargin_75">
            <div class="col-xs-12">
                <div class="teaser text-center">
					<div class="teaser_icon highlight size_small">
						<i class="rt-icon2-heart"></i>
					</div>
					<h4>
						<a href="#">Cảm ơn bạn đã đăng ký</a>
					</h4>
					<p>Chúng tôi đã gửi cho bạn một email để  <strong class="grey">xác nhận</strong> Vui lòng kiểm tra email của bạn sau đó nhấn xác nhận để có thể sử dụng các dịch vụ của nha khoa Chí Nghiệm</p>
					<a href="{{ route('getloginpatients') }}" class="theme_button color1">Đăng nhập ngay</a>
				</div>
            </div>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>


@endsection