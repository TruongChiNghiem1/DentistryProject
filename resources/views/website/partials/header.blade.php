<header class="page_header header_white header_transparent table_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12">
                <a href="{{ asset('/') }}" class="logo top_logo">
                    <span class="logo-image"></span>
                    <h1>CHINGHIEM</h1>
                </a>
                <!-- header toggler -->
                <span class="toggle_menu"><span></span></span>
            </div>
            <div class="col-lg-9 col-md-8 text-right">
                <!-- main nav start -->
                <nav class="mainmenu_wrapper">
                    <ul class="mainmenu nav sf-menu">
                        <li class="active">
                            <a href="{{ asset('/') }}">Trang Chủ</a>
                        </li>
                        <!-- pages -->
                        <li>
                            <a href="{{ asset('/services') }}">Dịch vụ</a>
                        </li>
                        <!-- eof pages -->
                        <!-- services -->
                        <li>
                            <a href="{{ asset('/doctors') }}">Đội ngũ bác sĩ</a>
                        </li>
                        <!-- eof services -->
                        <!-- gallery -->
                        <li>
                            <a href="{{ asset('/news') }}">Tin Tức</a>
                        </li>
                        <!-- eof Gallery -->
                        <!-- blog -->
                        <li>
                            <a href="{{ asset('/booking') }}">Tư vấn ngay</a>
                        </li>
                        @if(!Auth::user())
                        <li>
                            <a href="{{ asset('/loginpatients') }}">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="{{ asset('/loginregister') }}">Đăng Ký</a>
                        </li>
                        @endif
                        
                        @if(Auth::user())
                        <li>
                            <a>Xin chào {{ Auth::user()->name }} </a>
                        </li>
                        <li>
                            <a href="{{ route('website.login.getappointment', ['uuid' => Auth::user()->uuid]) }}">Đặt lịch</a>
                        </li>
                        <li>
                            <a href="{{ route('website.login.getwpatient', ['uuid' => Auth::user()->uuid]) }}">Xem thông tin bệnh án</a>
                        </li>
                        <li>
                            <a href="{{ route('logoutpatient') }}">Log Out</a>
                        </li>
                        @endif
                        <!-- eof blog -->
                        <!-- contacts -->
                        {{-- @if(empty(Auth::user())
                        <li>
                            <a href="{{ asset('/loginpatients') }}">Đăng nhập</a>
                        </li>
                        @endif

                        {{-- <li>
                            <a href="#">Đăng ký</a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- eof main nav -->
            </div>
        </div>
    </div>
</header>
