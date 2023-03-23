

<!DOCTYPE html>
<html lang="en" class="h-100">

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
	<meta property="og:image" content="https://innap.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>12 Zodiac - Lỗi 403</title>
	
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
    
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text  fw-bold">403</h1>
                        <h4><i class="fa fa-times-circle text-danger"></i> Forbidden Error!</h4>
                        <p>You do not have permission to view this resource.</p>
						<div>
                            <a class="btn btn-primary" href="{{ route('logout')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<script src="{{ asset('admin/js/deznav-init.js') }}"></script>
<script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
</body>
</html>