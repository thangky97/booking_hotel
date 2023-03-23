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
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-lg-12">
                                <div class="auth-form">
                                        <h4 class="text-center mb-4">Đăng ký tài khoản 12 Zodiac</h4>
                                    <div class="card-body">
                                        <div class="form-validation">
                                            <form class="needs-validation" novalidate action="{{route('postRegister')}}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="name" class="form-control" id="validationCustom01"
                                                                    placeholder="Nhập tên.." required
                                                                    value="@isset($request['name']){{ $request['name'] }}@endisset">
                                                                <div class="invalid-feedback">
                                                                    Please enter a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="email" class="form-control" id="validationCustom02"
                                                                    placeholder="Nhập email.." required
                                                                    value="@isset($request['email']){{ $request['email'] }}@endisset">
                                                                <div class="invalid-feedback">
                                                                    Please enter a Email.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom03">Mật khẩu
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="password" name="password" class="form-control" id="validationCustom03"
                                                                    placeholder="Nhập mật khẩu.." required
                                                                    value="@isset($request['password']){{ $request['password'] }}@endisset">
                                                                <div class="invalid-feedback">
                                                                    Please enter a password.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="">Ảnh
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <div class="form-file">
                                                                    <input type="file" name="images"
                                                                        class="form-file-input form-control">
                                                                    @if (isset($admin) && $admin->avatar)
                                                                        <img src="{{ asset($admin->avatar) }}" alt="{{ $admin->name }}"
                                                                            width="100">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Số điện
                                                                thoại
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="number" name="phone" class="form-control" id="validationCustom08"
                                                                    placeholder="Nhập số điện thoại..." required
                                                                    value="@isset($request['phone']){{ $request['phone'] }}@endisset">
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Quyền
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <select name="role" class="default-select wide form-control"
                                                                    id="validationCustom05">
                                                                    <option data-display="Select">Chọn quyền</option>
                                                                    <option value="1">Admin</option>
                                                                    <option value="2">Nhân viên</option>
                                                                    <option value="0">Người dùng</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a one.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                                                </div>
                                            </form>
                                            <div class="new-account mt-3">
                                                <p>Bạn đã có tài khoản? <a class="text-primary" href="{{ route('getLogin')}}">Đăng nhập</a></p>
                                            </div>
                                        </div>
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
