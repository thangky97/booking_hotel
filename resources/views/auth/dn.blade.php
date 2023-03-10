<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Innap : Hotel Admin Template" />
    <meta property="og:title" content="Innap : Hotel Admin Template" />
    <meta property="og:description" content="Innap : Hotel Admin Template" />
    <meta property="og:image" content="page-error-404.html" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('admin/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="vh-100">
    {{-- @if (Auth::user())
        <script>
            window.location.href = '/';
        </script>
    @endif --}}
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Đăng nhập vào Zodiac</h4>
                                    <form action="{{ route('auth.postLogin') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="hello@example.com">
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Mật khẩu</strong></label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Nhập mật khẩu...">
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            {{-- <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div> --}}
                                            <div class="mb-3">
                                                <a href="#">Quên mật khẩu?</a>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                        </div>
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    </form>
                                    <?php //Hiển thị thông báo thành công
                                    ?>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <strong>{{ Session::get('success') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                    @endif
                                    <?php //Hiển thị thông báo lỗi
                                    ?>
                                    {{-- Hiển thị 1 lỗi --}}
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <strong>{{ Session::get('error') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                    @endif
                                    {{-- Hiển thị nhiều lỗi --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="new-account mt-3">
                                        <p>Bạn chưa có tài khoản? <a class="text-primary" href="">Đăng ký</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/dropzone/dist/dropzone.js') }}"></script>
    <script src="{{ asset('admin/vendor/moment/moment.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/fullcalendar/js/main.min.j') }}s"></script>
    <!-- Chart piety plugin files -->
    <script src="{{ asset('admin/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('admin/vendor/apexchart/apexchart.js') }}"></script>

    <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('admin/js/plugins-init/fullcalendar-init.js') }}"></script>
    <script src="{{ asset('admin/js/dz.carousel.js') }}"></script>

    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/deznav-init.js') }}"></script>
    <script src="{{ asset('admin/js/demo.js') }}"></script>
    <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('admin/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script>
        $(function() {
            $('#datetimepicker').datetimepicker({
                inline: true,
            });
        });

        $(document).ready(function() {
            $(".booking-calender .fa.fa-clock-o").removeClass(this);
            $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
        });
    </script>
</body>

</html>
