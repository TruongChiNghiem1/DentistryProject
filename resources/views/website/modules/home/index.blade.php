@extends('website.master')

@section('content')
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
	<div class="widget widget_search">
		<form method="get" class="searchform form-inline" action="#">
			<div class="form-group">
				<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
			</div>
			<button type="submit" class="theme_button">Search</button>
		</form>
	</div>
</div>
<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
	<div id="box_wrapper">
		<!-- template sections -->
		<section class="intro_section page_mainslider ds">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="{{ asset('website/images/slide01.jpg') }}" alt="">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="slide_description_wrapper">
										<div class="slide_description">
											<div class="intro-layer" data-animation="slideExpandUp">
												<h3>CHĂM SÓC RĂNG MIỆNG CHO BẠN</h3>
											</div>
											<div class="intro-layer" data-animation="slideExpandUp">
												<p class="fontsize_20">Nếu bạn không có nụ cười đẹp, thì bạn nên đến với tôi! Nha khoa gia đình nụ cười đẹp sẽ trở lại với bạn.</p>
												<a href="{{ asset('/booking') }}" class="theme_button color1">Tư vấn ngay</a>
											</div>
										</div>
										<!-- eof .slide_description -->
									</div>
									<!-- eof .slide_description_wrapper -->
								</div>
								<!-- eof .col-* -->
							</div>
							<!-- eof .row -->
						</div>
						<!-- eof .container -->
					</li>
					<li>
						<img src="{{ asset('website/images/slide02.jpg') }}" alt="">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="slide_description_wrapper">
										<div class="slide_description">
											<div class="intro-layer" data-animation="slideExpandUp">
												<h3>NHA KHOA VỚI TRÁI TIM</h3>
											</div>
											<div class="intro-layer" data-animation="slideExpandUp">
												<p class="fontsize_20">Tạo ra nụ cười khỏe mạnh mà bạn muốn thông qua khoa học và nghệ thuật.<br> Vì ai cũng xứng đáng được mỉm cười.</p>
												<a href="{{ asset('/booking') }}" class="theme_button color1">Tư vấn ngay</a>
											</div>
										</div>
										<!-- eof .slide_description -->
									</div>
									<!-- eof .slide_description_wrapper -->
								</div>
								<!-- eof .col-* -->
							</div>
							<!-- eof .row -->
						</div>
						<!-- eof .container -->
					</li>
					<li>
						<img src="{{ asset('website/images/slide03.jpg') }}" alt="">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text-center">
									<div class="slide_description_wrapper">
										<div class="slide_description">
											<div class="intro-layer" data-animation="slideExpandUp">
												<h3>CHĂM SÓC CHO NỤ CƯỜI CỦA BẠN</h3>
											</div>
											<div class="intro-layer" data-animation="slideExpandUp">
												<p class="fontsize_20">Thư giãn, điều này sẽ rất dễ dàng. Cách thông minh để tìm một nha sĩ. Hãy kết hợp với một nha sĩ tuyệt vời ngay hôm nay. Nghiêm túc mà nói, đã đến lúc.</p>
												<a href="{{ asset('/booking') }}" class="theme_button color1">Tư vấn ngay</a>
											</div>
										</div>
										<!-- eof .slide_description -->
									</div>
									<!-- eof .slide_description_wrapper -->
								</div>
								<!-- eof .col-* -->
							</div>
							<!-- eof .row -->
						</div>
						<!-- eof .container -->
					</li>
				</ul>
			</div>
			<!-- eof flexslider -->
		</section>
		<section class="ls columns_padding_0 columns_margin_0" id="features-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="with_padding maindarker3_bg_color topborder_radius_4 feature-teaser">
							<img src="{{ asset('website/img/certification.png') }}" alt="" class="teaser_icon">
							<p class="fontsize_18 semibold topmargin_15 bottommargin_5">Chứng nhận</p>
							<p class="margin_0">
								Corned beef pancetta ut, aliquip tri-tip turducken pork chop. Cow beef eu bacon jowl pastrami.
							</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="with_padding maindarker2_bg_color topborder_radius_4 feature-teaser">
							<img src="{{ asset('website/img/time.png') }}" alt="" class="teaser_icon">
							<p class="fontsize_18 semibold topmargin_15 bottommargin_5">Mở cửa 24/7</p>
							<p class="margin_0">
								Dolor corned beef ipsum, nulla filet mignon flank in ut minim. Boudin landjaeger pork belly.
							</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="with_padding maindarker1_bg_color topborder_radius_4 feature-teaser">
							<img src="{{ asset('website/img/personal.png') }}" alt="" class="teaser_icon">
							<p class="fontsize_18 semibold topmargin_15 bottommargin_5">Đội ngũ nhân viên chuyên nghiệp</p>
							<p class="margin_0">
								Pork belly chicken nulla swine. Occaecat culpa dolor beef ribs adipisicing et tri-tip eu esse.
							</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="with_padding main_bg_color topborder_radius_4 feature-teaser">
							<img src="{{ asset('website/img/like.png') }}" alt="" class="teaser_icon ">
							<p class="fontsize_18 semibold topmargin_15 bottommargin_5">Giá cả hợp lý</p>
							<p class="margin_0">
								Lorem chicken culpa, sed filet mignon chuck shank ground und in id laboris laborum short.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ls section_padding_110">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="side-item about-item">
							<div class="row display_table_md">
								<div class="col-md-6 display_table_cell_md">
									<div class="with_backing">
										<img src="{{ asset('website/images/about.jpg') }}" alt="" class="border_radius_4">
									</div>
								</div>
								<div class="col-md-6 display_table_cell_md">
									<div class="item-content">
										<h2 class="section_header margin_0">Về chúng tôi</h2>
										<hr class="main_bg_color dividersize_2_70 inline-block">
										<p>
											Răng giả thực sự cải thiện nụ cười và vẻ ngoài tổng thể của chúng ta. Chúng không chỉ giúp chúng ta trông đẹp hơn mà còn giúp cuộc sống của chúng ta dễ dàng hơn. Tận hưởng những điều đơn giản như thức ăn, trò chuyện và mỉm cười. Quên đi những cuộc gặp gỡ xã hội không thoải mái. Trọng tâm của chúng tôi là sức khỏe tổng thể của bạn và giúp bạn đạt được sức khỏe và thẩm mỹ tối ưu.
										</p>
										<p class="bold text-uppercase bottommargin_2">
											PHÒNG NGỪA RĂNG MIỆNG
											<span class="bold pull-right">75%</span>
										</p>
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="75">
											</div>
										</div>
										<p class="bold text-uppercase bottommargin_2">
											XỬ LÝ FLORUA
											<span class="bold pull-right">50%</span>
										</p>
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="50">
											</div>
										</div>
										<p class="bold text-uppercase bottommargin_2">
											NHỔ RĂNG
											<span class="bold pull-right">90%</span>
										</p>
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="90">
											</div>
										</div>
										<p class="bold text-uppercase bottommargin_2">
											Răng sứ
											<span class="bold pull-right">85%</span>
										</p>
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="85">
											</div>
										</div>
										<a href="about.html" class="theme_button color1 topmargin_10">Tìm hiểu về chúng tôi</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="cs parallax section_padding_100 columns_padding_0 columns_margin_0" id="services">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="section_header margin_0">DỊCH VỤ CỦA CHÚNG TÔI</h2>
						<hr class="dividersize_2_70 inline-block">
					</div>
				</div>
				<div class="row services-container topmargin_50">
					@php
						$i=0;
					@endphp
					@foreach($services as $service)
						@if($service->hidden != 1)
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 service-item text-center">
								<div class="with_padding">
									<div class="service-icon service-protection"></div>
									<p class="fontsize_18 semibold bottommargin_5">{{ $service->services_name }}</p>
									<div class="margin_0 text-truncate item-content short_text">
										<p>
											{!! $service->decription !!}
										</p>
									</div>
									<div class="media-links">
										<a class="abs-link" href="{{ route('website.detail',['id' => $service->uuid]) }}"></a>
									</div>
								</div>
							</div>
						@endif
						@php
                            $i++;
                            if( $i == 8 )
                                break;
                        @endphp
					@endforeach
					
				</div>
			</div>
		</section>
		<section class="ls section_padding_110">
			<div class="container">
				<div class="row topmargin_-5">
					<div class="col-sm-12 text-center">
						<h2 class="section_header margin_0">Bảng giá</h2>
						<hr class="dividersize_2_70 inline-block main_bg_color">
					</div>
				</div>
				<div class="row topmargin_30">
					@php
						$i=0;
					@endphp
					@foreach($services as $service)
						@if($service->hidden != 1)
							<div class="col-md-3 col-sm-6 col-xs-12">
								<ul class="price-table style1">
									<li class="plan-name maindarker3_bg_color">
										<h6>{{ $service->services_name }}</h6>
									</li>
									<li class="plan-price">
										<span class="highlight">{{ number_format($service->price, 0, "", ".") }}VND</span>
									</li>
									<li class="features-list">
										<ul>
											{{-- <li class="enabled">Feature 01</li>
											<li class="enabled">Feature 02</li>
											<li class="disabled">Feature 03</li>
											<li class="enabled">Feature 04</li> --}}
										</ul>
										<div class="call-to-action"><a href="{{ asset('/booking') }}" class="theme_button color1 border_button">Tư vấn ngay</a></div>
									</li>
								</ul>
							</div>
						@endif
						@php
                            $i++;
                            if( $i == 4 )
                                break;
                        @endphp
					@endforeach
				</div>
			</div>
		</section>
		
		<section class="ls ms page_banner section_padding_50 texture_bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="banner border_radius_4 scheme_background">
							<div class="banner-content border_radius_4 text-center">
								<div class="icon scheme_background"></div>
								<p class="fontsize_24 regular bottommargin_10">Liên hệ đường dây nóng</p>
								<p class="semibold highlight2 size_normal">+84 859 774 418</p>
								<div class="scheme_background">
									<a href="{{ asset('/booking') }}" class="theme_button color1 margin_0">Tư vấn ngay</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ls section_padding_110">
			<div class="container">
				<div class="row topmargin_-5">
					<div class="col-sm-12 text-center">
						<h2 class="section_header margin_0">Tin mới nhất</h2>
						<hr class="dividersize_2_70 inline-block main_bg_color">
					</div>
				</div>
				<div class="row topmargin_30">
					@php
						$i=0;
					@endphp
					@foreach($news as $new)
					<div class="col-md-4">
						<article class="vertical-item with_border thick_border border_radius_4 post text-center">
							<div class="item-media entry-thumbnail">
								@php
									$images = !empty($new->images) ? $new->images : 'default.png';   
								@endphp
								<img src="{{ asset('images/'. $images) }}" alt="">
							</div>
							<header class="entry-header scheme_background">
								<a href="{{ route('website.newsdetail',['id' => $new->uuid]) }}" class="with_padding">
									<time datetime="2016-08-01T15:05:23+00:00" class="entry-date">
									{{ $new->created_at }}
									</time>
									<h4 class="entry-title">{{ $new->intro }}</h4>
								</a>
							</header>
							<div class="item-content short_text">
								<p>
									{!! $new->decription !!}
								</p>
								<hr>
							</div>
							<div class="post-meta">
								<span class="views"><i class="fa fa-eye highlight"></i> <span class="semibold">4806</span></span>
								<span class="likes"><i class="fa fa-heart-o highlight"></i> <span class="semibold">350</span></span>
								<span class="comments"><i class="fa fa-comment-o highlight"></i> <span class="semibold">45</span></span>		
							</div>
						</article>
					</div>
					@php
						$i++;
						if( $i == 3 )
							break;
					@endphp
					@endforeach
				</div>
			</div>
		</section>
		{{-- <section id="map"></section> --}}
@endsection