<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Nha khoa Chí Nghiệm</title>
        <link rel="icon" href="{{ asset('admin/img/logo.png') }}" type="image/png">
        @include('website.partials.head')
    </head>
    <body>
		{{-- Loading --}}
        <div class="preloader">
            <div class="preloader_image"></div>
        </div>

		{{-- Header --}}
		@include('website.partials.header')

		{{-- Main --}}
			@yield('content')


		{{-- Footer --}}
        	@include('website.partials.footer')
		
        <!-- eof #canvas -->
        @include('website.partials.script')
    </body>
    <!-- Mirrored from html.modernwebtemplates.com/medent/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 16:25:03 GMT -->
</html>