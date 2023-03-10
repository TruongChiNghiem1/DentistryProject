<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here...">
                            </div>
                            <button type="submit"> <img src="{{ asset('admin/img/icon/icon_search.svg') }}" alt=""> </button>
                        </form>
                    </div>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    
                    <div class="profile_info">
                        @php
                            $avatar = !empty(Auth::user()->avatar) ? Auth::user()->avatar : 'default.png';   
                        @endphp
                        <img src="{{ asset('avatar/'.$avatar) }}" width="50px">
                        <div class="profile_info_iner">
                            @switch(Auth::user()->level)
                                @case (4) <p>Super Admin</p>
                                        @break
                                @case (1) <p>Admin</p>
                                        @break
                                @case (2) <p>Điều dưỡng</p>
                                        @break
                            @endswitch
                            
                            <h5>{{ Auth::user()->name }}</h5>
                            <div class="profile_info_details">
                                <a href="{{ route('logout') }}">Log Out <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="#">My Profile <i class="ti-user"></i></a>
    <a href="#">Settings <i class="ti-settings"></i></a> --}}
</div>