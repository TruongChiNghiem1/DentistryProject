<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="#"><img src="{{ asset('admin/img/logo.png') }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="side_menu_title">
            <span>Thống kê</span>
        </li>
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/1.svg') }}" alt="">
            <span>Chi tiết</span>
            </a>
        </li>
        @if(Auth::user()->level == 1 || Auth::user()->level == 4)
        <li class="side_menu_title">
            <span>Admin</span>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/users') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/6.svg') }}" alt="">
            <span>Quản lý tài khoản</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/information/services') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/3.svg') }}" alt="">
            <span>Dịch vụ</span>
            </a>
        </li>
        <li class=""> 
            <a class="has-arrow" href="{{ asset('admin/information/doctors') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/2.svg') }}" alt="">
            <span>Bác sĩ</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->level == 2 || Auth::user()->level == 4)
        <li class="side_menu_title">
            <span>Điều dưỡng</span>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/information/calendars') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/4.svg') }}" alt="">
            <span>Lịch làm việc toàn khoa</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/information/news') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/5.svg') }}" alt="">
            <span>Tin Tức</span>
            </a>
        </li>
        
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/information/patients') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/7.svg') }}" alt="">
            <span>Hồ sơ bệnh án</span>
            </a> 
        </li>
        <li class="">
            <a class="has-arrow" href="{{ asset('admin/information/booking') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/7.svg') }}" alt="">
            <span>Thông tin tư vấn</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ route('admin.information.booking.appointment') }}" aria-expanded="false">
            <img src="{{ asset('admin/img/menu-icon/7.svg') }}" alt="">
            <span>Thông tin lịch đặt khám</span>
            </a>
        </li>
        @endif
    </ul>
</nav>