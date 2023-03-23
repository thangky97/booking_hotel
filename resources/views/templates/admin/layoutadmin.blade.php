{{-- @php
    $admin = \Illuminate\Support\Facades\Auth::user()->admin();

@endphp --}}
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
    <link href="{{ asset('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/lightgallery/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/fullcalendar/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    {{-- toast --}}
    <link href="{{ asset('iziToast.min.css') }}" rel="stylesheet">
    {{-- datepicker --}}
    <link href="{{ asset('datepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet">
    @yield('css')
    <style>
        body,
    html {
        margin: 0;
        padding: 0;
    }

    body {

        background: #FFEFBA;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #FFFFFF, #FFEFBA);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">1</span>
            <span style="--i:2">2</span>
            <span style="--i:3"> </span>
            <span style="--i:4">Z</span>
            <span style="--i:5">o</span>
            <span style="--i:6">d</span>
            <span style="--i:7">i</span>
            <span style="--i:8">a</span>
            <span style="--i:9">c</span>
            <span style="--i:10">.</span>
            <span style="--i:11">.</span>
            <span style="--i:12">.</span>
        </div>
    </div>
   

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
         

        <!--**********************************
            Nav header start
        ***********************************-->
        

        <!--Header-->
        @include('templates.admin.header')

        <!--Sidebar-->
        @include('templates.admin.aside')

        <!--Content-->
        @yield('content')

        <!--Footer-->
        @include('templates.admin.footer')

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
    <script src="{{ asset('admin/js/custom_new.js') }}"></script>
    <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('admin/vendor/owl-carousel/owl.carousel.js') }}"></script>
    {{-- Toast --}}
    <script src="{{ asset('iziToast.min.js') }}"></script>
    {{-- datepicker --}}
    <script src="{{ asset('datepicker/jquery.datetimepicker.full.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.picker').datetimepicker({
                autoclose: true,
                timepicker: false,
                datetimepicker: true,
                format: "d/m/Y",
                weeks: true,
            });
            // $.datetimepicker.setLocale('vi');
        });
    </script>

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