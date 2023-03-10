<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>Đăng nhập | Nha khoa Chí Nghiệm</title>
        <link rel="icon" href="{{ asset('admin/img/logo.png') }}" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <!-- External CSS libraries -->
        <link type="text/css" rel="stylesheet" href="{{ asset('getlogin_patients/assets/css/bootstrap.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('getlogin_patients/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('getlogin_patients/assets/fonts/flaticon/font/flaticon.css') }}">
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <!-- Custom Stylesheet -->
        <link type="text/css" rel="stylesheet" href="{{ asset('getlogin_patients/assets/css/style.css') }}">
    </head>
    <body id="top">
        <div class="page_loader"></div>
        <!-- Login 2 start -->
        <div class="login-2 login-background">
            <div class="login-background-inner">
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
            </div>
            <div class="login-2-inner">
                <div class="container">
                    <div class="row login-box">
                        <div class="col-lg-6 align-self-center pad-0 form-info">
                            <div class="form-section align-self-center">
                                <h3>Đăng nhập</h3>
                                <div class="btn-section clearfix">
                                    <a href="{{ asset('/loginpatients') }}" class="link-btn active btn-1 active-bg">Đăng nhập</a>
                                    <a href="{{ asset('/loginregister') }}" class="link-btn btn-2 default-bg">Đăng ký</a>
                                </div>
                                <div class="clearfix"></div>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
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
                                
                                <form action="{{ route('postloginpatients') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group clearfix">
                                        <input name="password" type="password" class="form-control" autocomplete="off" placeholder="Mật khẩu" aria-label="Password">
                                    </div>
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn btn-lg btn-info btn-theme">Đăng nhập</button>
                                        <a href="#" class="forgot-password float-end">Quên mật khẩu</a>
                                    </div>
                                </form>
                                <p class="mb-0">Bạn chưa có tài khoản? <a href="{{ asset('/loginregister') }}">Đăng ký ngay</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center pad-0 bg-img">
                            <div class="info clearfix">
                                <div class="box">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="content">
                                        <h3>Chào mừng đến với nha khoa Chí Nghiệm</h3>
                                        <div class="social-list">
                                            <a href="https://www.facebook.com/TruongChiNghiem3009" class="facebook-bg">
                                            <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="https://www.facebook.com/TruongChiNghiem3009" class="twitter-bg">
                                            <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="https://www.facebook.com/TruongChiNghiem3009" class="google-bg">
                                            <i class="fa fa-google"></i>
                                            </a>
                                            <a href="https://www.facebook.com/TruongChiNghiem3009" class="linkedin-bg">
                                            <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login 2 end -->
        <!-- External JS libraries -->
        <script src="{{ asset('getlogin_patients/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('getlogin_patients/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('getlogin_patients/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('getlogin_patients/assets/js/app.js') }}"></script>
        <!-- Custom JS Script -->
    </body>
</html>