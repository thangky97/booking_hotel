<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập - Hotel 12Zodiac</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}" />

    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-mytravel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">

    <!-- CSS MyTravel Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>

<body>
    <!-- ========== HEADER ========== -->
    <header id="header"
        class="u-header u-header--abs-top u-header--white-nav-links-xl u-header--bg-transparent u-header--show-hide border-bottom border-xl-bottom-0 border-color-white"
        data-header-fix-moment="500" data-header-fix-effect="slide">
        <div class="u-header__section u-header__shadow-on-show-hide">
            <div
                class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-white">
                <div class="d-flex align-items-center">
                    <div class="mt-7 d-flex align-items-center" style="margin-left: 450px">
                        <div class=" px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                            <div id="" class=" py-0 mt-0" aria-labelledby="signUpDropdownInvoker"
                                style="min-width: 500px;">
                                <div class="card rounded-xs">
                                    <form class="js-validate" novalidate="novalidate" action="{{ route('postSignin') }}"
                                        method="post">
                                        @csrf
                                        <!-- Header -->
                                        <div class="card-header text-center">
                                            <h3 class="h5 mb-0 font-weight-semi-bold">Đăng nhập<a href="{{route('route_FrontEnd_Home')}}"> <i>12 Zodiac</i></a></h3>
                                        </div>
                                        <div id="msg-box" class="mt-3">
                                            <?php //Hiển thị thông báo thành công
                                            ?>
                                            @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>{{ Session::get('success') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            @endif
                                            <?php //Hiển thị thông báo lỗi
                                            ?>
                                            @if ( Session::has('error') )
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- End Header -->
                                        <div class="card-body pt-6 pb-4">
                                            <div class="form-group pb-1">
                                                <div
                                                    class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                    <label class="sr-only" for="signinSrEmail">Email</label>
                                                    <div
                                                        class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                        <input type="email" class="form-control" name="email"
                                                            id="signinSrEmail" placeholder="Nhập email..."
                                                            aria-label="Email Or Username"
                                                            aria-describedby="signinEmail" required=""
                                                            data-msg="Please enter a valid email address."
                                                            data-error-class="u-has-error"
                                                            data-success-class="u-has-success">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="signinEmail">
                                                                <span class="far fa-envelope font-size-20"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <div>
                                                        <p class="text-danger font-size-14">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group pb-1">
                                                <div
                                                    class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                    <label class="sr-only" for="signinSrPassword">Password</label>
                                                    <div
                                                        class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                        <input type="password" class="form-control" name="password"
                                                            id="signinSrPassword" placeholder="Nhập mật khẩu..."
                                                            aria-label="Password" aria-describedby="signinPassword"
                                                            required=""
                                                            data-msg="Your password is invalid. Please try again."
                                                            data-error-class="u-has-error"
                                                            data-success-class="u-has-success">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="signinPassword">
                                                                <span class="flaticon-password font-size-20"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <div>
                                                        <p class="text-danger font-size-14">{{ $message }}</p>
                                                    </div> 
                                                @enderror
                                            </div>
                                            <div class="mb-3 pb-1">
                                                <button type="submit"
                                                    class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Đăng
                                                    nhập</button>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" id="customCheckboxInline1"
                                                        name="customCheckboxInline1" class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customCheckboxInline1">Ghi nhớ</label>
                                                </div>
                                                <a class=" text-primary font-size-14"
                                                    href="{{route('forgetPassword')}}" 
                                                   ><u>Quên mật
                                                        khẩu?</u></a>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            {{-- <div class="card-footer__top border-bottom border-color-8 py-3">
                                                <div class="text-center mt-2 mb-4 pb-1">
                                                    <span class="d-block text-gray-1 fontsize-14">or</span>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <a class="btn btn-block btn-sm btn-facebook transition-3d-hover"
                                                        href="{{ route('getLoginGoogle') }}">
                                                        <span class="fab fa-google mr-2"></span>
                                                        Google
                                                    </a>
                                                    <a class="btn btn-block btn-sm btn-google transition-3d-hover ml-5 mt-0"
                                                        href="#">
                                                        <span class="fab fa-facebook-f mr-2"></span>
                                                        Facebook
                                                    </a>
                                                </div>
                                            </div> --}}

                                            <div class="card-footer__bottom p-4 text-center font-size-14">
                                                <span class="text-gray-1">Chưa có tài khoản?</span>
                                                <a class="font-weight-bold" href="{{ route('getSignup') }}"
                                                    data-target="#signup" data-link-group="idForm"
                                                    data-animation-in="fadeIn">Đăng ký</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== End HEADER ========== -->

    <!-- Go to Top -->
    <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
        data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp"
        data-hide-effect="slideOutDown">
        <span class="flaticon-arrow u-go-to-modern__inner"></span>
    </a>
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>

    <!-- JS MyTravel -->
    <script src="{{ asset('assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.unfold.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.validation.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.show-animation.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.range-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.selectpicker.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.quantity-counter.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 1199.98,
                hideTimeOut: 0
            });

            // Page preloader
            setTimeout(function() {
                $('#jsPreloader').fadeOut(500)
            }, 800);
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // initialization of datepicker
            $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

            // initialization of select
            $.HSCore.components.HSSelectPicker.init('.js-select');

            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
</body>

</html>
