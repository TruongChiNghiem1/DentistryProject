@extends('website.master')

@section('content')
<section class="ls section_padding_top_65 section_padding_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-md-8 to_animate" data-animation="scaleAppear">
                <h4 class="bottommargin_30">Đăng ký tư vấn</h4>
                @if (Session::get('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                @endif
                <form class="row columns_padding_5" method="post" action="">
                    @csrf
                    <div class="col-sm-6">
                        <div class="contact-form-name">
                            <label for="name" >Họ và tên<span class="required">*</span></label>
                            <input type="text" aria-required="true" size="30" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Họ và tên">
                            @if ($errors->has('name'))
                                <p class="help is-danger text-left text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>     
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="contact-form-phone">
                            <label for="phone">Số điện thoại<span class="required">*</span></label>
                            <input type="text" aria-required="true" size="30" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="Số điện thoại">
                            @if ($errors->has('phone'))
                                <p class="help is-danger text-left text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="contact-form-subject">
                            <div>
                                <label for="subject">Dịch vụ mà bạn quan tâm<span class="required">*</span></label>
                            </div>
                            <select name="services_id" class="form-control">
                                @foreach ($services as $sv)
                                    @if($sv->hidden == 2)
                                        <option value="{{ $sv->id }}" >{{ $sv->services_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('services_id'))
                                <p class="help is-danger text-left text-danger">{{ $errors->first('services_id') }}</p>
                            @endif
                            {{-- 
                            <input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Dịch vụ mà bạn quan tâm"> --}}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="contact-form-email">
                            <label for="email" >Email<span class="required">*</span></label>
                            <input type="email" aria-required="true" size="30" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="Email">
                            @if ($errors->has('email'))
                                <p class="help is-danger text-left text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="">
                            <label for="message" >Ghi chú</label>
                            <textarea aria-required="true" rows="9" value="{{ old('message') }}" cols="45" name="message" id="message" class="form-control" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="contact-form-submit topmargin_30">
                            <button type="submit" id="contact_form_submit" class="theme_button wide_button color1">Đăng ký tư vấn</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 to_animate" data-animation="scaleAppear">
				<h4 class="bottommargin_30">THÔNG TIN LIÊN HỆ</h4>
				<div class="widget widget_text topmargin_20">
					<div class="media">
						<div class="media-left">
							<i class="fa fa-map-marker highlight fontsize_18"></i>
						</div>
						<div class="media-body">
							607 Tân sơn, phường 12, quận Gò Vấp, Tp Hồ Chí Minh
						</div>
					</div>
					<div class="media">
						<div class="media-left">
							<i class="fa fa-clock-o highlight fontsize_18"></i>
						</div>
						<div class="media-body">
							09:00 - 22:00
						</div>
					</div>
					<div class="media">
						<div class="media-left">
							<i class="fa fa-phone highlight fontsize_18"></i>
						</div>
						<div class="media-body">
                            085 977 4418
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection