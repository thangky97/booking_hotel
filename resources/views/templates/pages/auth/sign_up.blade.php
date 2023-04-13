<!DOCTYPE html>
<html lang="en">

<head>

    <title>Đăng ký - Hotel 12Zodiac</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="../../favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-mytravel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">

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
                                    <form class="js-validate" novalidate="novalidate" action="{{ route('postSignup') }}"
                                        method="post">
                                        @csrf
                                        <div class="card-header text-center">
                                            <h3 class="h5 mb-0 font-weight-semi-bold">Đăng ký</h3>
                                        </div>
                                        <!-- End Header -->
                                        <div class="card-body pt-5 pb-4">

                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="pills-one-code-sample"
                                                    role="tabpanel" aria-labelledby="pills-one-code-sample-tab">
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div
                                                            class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="uname">Tên</label>
                                                            <div
                                                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control"
                                                                    value="@isset($request['name']){{ $request['name'] }}@endisset"
                                                                    name="name" id="uname"
                                                                    placeholder="Nhập tên..." aria-label="User Name"
                                                                    aria-describedby="username" required=""
                                                                    data-msg="Please enter a valid user name."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="username">
                                                                        <span class="flaticon-user font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('name')
                                                    <div>
                                                        <p class="text-danger font-size-14">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                    </div>

                                                    <div class="form-group pb-1">
                                                        <div
                                                            class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupSrEmail">Email</label>
                                                            <div
                                                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control"
                                                                    value="@isset($request['email']){{ $request['email'] }}@endisset"
                                                                    name="email" id="signupSrEmail"
                                                                    placeholder="Nhập email..." aria-label="Email"
                                                                    aria-describedby="signupEmail" required=""
                                                                    data-msg="Please enter a valid email address."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="signupEmail">
                                                                        <span
                                                                            class="far fa-envelope font-size-20"></span>
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
                                                    <!-- End Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div
                                                            class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupGender">Giới
                                                                tính</label>
                                                            <div
                                                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <select name="gender"
                                                                    class="default-select wide form-control"
                                                                    id="validationCustom05">
                                                                    <option data-display="Chọn giới tính" value="">Giới tính
                                                                    </option>
                                                                    <option value="1">Nam</option>
                                                                    <option value="2">Nữ</option>
                                                                </select>
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="signupPassword">
                                                                        <span class="flaticon-user font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('gender')
                                                    <div>
                                                        <p class="text-danger font-size-14">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                    </div>
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div
                                                            class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupSrPassword">Mật
                                                                khẩu</label>
                                                            <div
                                                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control"
                                                                    value="@isset($request['password']){{ $request['password'] }}@endisset"
                                                                    name="password" id="signupSrPassword"
                                                                    placeholder="Nhập mật khẩu..."
                                                                    aria-label="Password"
                                                                    aria-describedby="signupPassword" required=""
                                                                    data-msg="Your password is invalid. Please try again."
                                                                    data-error-class="u-has-error"
                                                                    data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="signupPassword">
                                                                        <span
                                                                            class="flaticon-password font-size-20"></span>
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
                                                    <div class="form-group pb-1">
                                                        <div
                                                            class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signupPhone">Số điện
                                                                thoại</label>
                                                            <div
                                                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="number" class="form-control"
                                                                    value="@isset($request['phone']){{ $request['phone'] }}@endisset"
                                                                    name="phone" id="signupSrPassword"
                                                                    placeholder="Nhập số điện thoại..."
                                                                    aria-label="Password"
                                                                    aria-describedby="signupPassword" required="">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="signupPassword">
                                                                        <span class="fas fa-phone font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('phone')
                                                    <div>
                                                        <p class="text-danger font-size-14">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                    </div>

                                                    <div class="">
                                                        <button type="submit"
                                                            class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Đăng
                                                            ký</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-0">
                                            {{-- <div class="card-footer__top border-bottom border-color-8 py-3">
                                                <div class="text-center mt-2 mb-4 pb-1">
                                                    <span class="d-block text-gray-1 fontsize-14">or</span>
                                                </div>
                                                <div class="d-flex mb-3">
                                                    <a class="btn btn-block btn-sm btn-facebook transition-3d-hover"
                                                        href="#">
                                                        <span class="fab fa-facebook-f mr-2"></span>
                                                        Facebook
                                                    </a>
                                                    <a class="btn btn-block btn-sm btn-twitter transition-3d-hover ml-5 mt-0"
                                                        href="#">
                                                        <span class="fab fa-twitter mr-2"></span>
                                                        Twitter
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <div class="card-footer__bottom p-4 text-center font-size-14">
                                                <span class="text-gray-1">Đã có tài khoản?</span>
                                                <a class="font-weight-bold" href="{{ route('getSignin') }}">Đăng
                                                    nhập</a>
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
