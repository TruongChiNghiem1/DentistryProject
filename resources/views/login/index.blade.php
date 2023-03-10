<!DOCTYPE html>
<html lang="zxx">
    <!-- Mirrored from demo.dashboardpack.com/hospital-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Aug 2022 19:00:14 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin login | Nha khoa Chí Nghiệm</title>
        <link rel="icon" href="{{ asset('admin/img/logo.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap1.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/themefy_icon/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/swiper_slider/css/swiper.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/niceselect/css/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/owl_carousel/css/owl.carousel.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/gijgo/gijgo.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/font_awesome/css/all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/tagsinput/tagsinput.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/datatable/css/jquery.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/datatable/css/responsive.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/datatable/css/buttons.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/text_editor/summernote-bs4.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/morris/morris.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/material_icon/material-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/style1.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/colors/default.css') }}" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">
        <div class="white_box_login">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center">
                            <h5 class="modal-title">Admin log in dentistry CHINGHIEM</h5>
                        </div>
                        
                        <div class="modal-body">
                            <form action="{{ route('postlogin') }}" method="post">
                                @csrf
                                <div class="border_style">
                                    <span>Đăng nhập</span>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif

                                @if (Session::get('error'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                         {{ Session::get('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        </div>
                                @endif
                                <div class="">
                                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                                </div>
                                <div class="">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button class="btn_1 full_width text-center" type="submit">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
        </section>
        <script src="{{ asset('admin/js/jquery1-3.4.1.min.js') }}"></script>
        <script src="{{ asset('admin/js/popper1.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap1.min.js') }}"></script>
        <script src="{{ asset('admin/js/metisMenu.js') }}"></script>
        <script src="{{ asset('admin/vendors/count_up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/chartlist/Chart.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/count_up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/swiper_slider/js/swiper.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/gijgo/gijgo.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('admin/js/chart.min.js') }}"></script>
        <script src="{{ asset('admin/vendors/progressbar/jquery.barfiller.js') }}"></script>
        <script src="{{ asset('admin/vendors/tagsinput/tagsinput.js') }}"></script>
        <script src="{{ asset('admin/vendors/text_editor/summernote-bs4.js') }}"></script>
        <script src="{{ asset('admin/vendors/apex_chart/apexcharts.js') }}"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
    </body>
</html>