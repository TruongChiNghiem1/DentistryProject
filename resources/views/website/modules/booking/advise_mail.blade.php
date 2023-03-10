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
						<a href="#">Cảm ơn bạn đã đăng ký tư vấn</a>
					</h4>
					<p>Thông tin của bạn đã được ghi nhận. Chúng tôi sẽ liên lạc đến bạn sớm nhất có thể</p>
					<a href="{{ route('website.index') }}" class="theme_button color1">Trang Chủ</a>
				</div>
            </div>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>

@endsection