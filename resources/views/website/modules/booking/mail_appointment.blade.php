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
						<a href="#">Lịch khám của bạn đã được tạo thành công</a>
					</h4>
					<a href="{{ route('website.index') }}" class="theme_button color1">Trang Chủ</a>
				</div>
            </div>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>

@endsection