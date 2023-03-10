<!DOCTYPE html>
<html lang="zxx">
    <!-- Mirrored from demo.dashboardpack.com/hospital-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 18:59:18 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->
    <head>
        @include('admin.partials.head')
    </head>
    <body class="crm_body_bg">
        {{-- Navbar --}}
        @include('admin.partials.sidebar')
        {{-- End navbar --}}

        <section class="main_content dashboard_part">
            {{-- Sidebar top --}}
            @include('admin.partials.sidebartop')
            {{-- Endsidebar top --}}
            
            {{-- error --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thành công!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
            @endif


            {{-- *******Main Content******* --}}
            @yield('content')
            {{-- *******End Main Content****** --}}

            
        </section>
        @include('admin.partials.footer')
    </body>
    <!-- Mirrored from demo.dashboardpack.com/hospital-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 18:59:48 GMT -->
</html>