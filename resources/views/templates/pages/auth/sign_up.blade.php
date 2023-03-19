
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>Home v1 | MyTravel - Responsive Website Template</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="../../favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-mytravel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/dist/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">

        <!-- CSS MyTravel Template -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    </head>
    <body>
        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header--abs-top u-header--white-nav-links-xl u-header--bg-transparent u-header--show-hide border-bottom border-xl-bottom-0 border-color-white" data-header-fix-moment="500" data-header-fix-effect="slide">
            <div class="u-header__section u-header__shadow-on-show-hide">
                <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-white">
                    <div class="d-flex align-items-center">
                        <div class="mt-7 d-flex align-items-center" style="margin-left: 450px">
                            <div class=" px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                                <div id="" class=" py-0 mt-0" aria-labelledby="signUpDropdownInvoker" style="min-width: 500px;">
                                    <div class="card rounded-xs">
                                        <form class="js-validate" novalidate="novalidate" action="{{ route('postSignin') }}" method="post">
                                            @csrf
                                            <!-- Signup -->
                                            <div id="signup" style="opacity: 0; display: none;" data-target-group="idForm">
                                                <!-- Header -->
                                                <div class="card-header text-center">
                                                    <h3 class="h5 mb-0 font-weight-semi-bold">Đăng ký</h3>
                                                </div>
                                                <!-- End Header -->
                                                <div class="card-body pt-5 pb-4">
                                                    <ul class="nav nav-default nav-pills nav-white nav-justified nav-rounded-pill font-weight-medium px-6 pb-5" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="pills-one-code-sample-tab" data-toggle="pill" href="#pills-one-code-sample" role="tab" aria-controls="pills-one-code-sample" aria-selected="true">Normal User</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-two-code-sample-tab" data-toggle="pill" href="#pills-two-code-sample" role="tab" aria-controls="pills-two-code-sample" aria-selected="false">Partner User</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane fade active show" id="pills-one-code-sample" role="tabpanel" aria-labelledby="pills-one-code-sample-tab">
                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="uname">User Name</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="text" class="form-control" name="uname" id="uname" placeholder="User Name" aria-label="User Name" aria-describedby="username" required="" data-msg="Please enter a valid user name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="username">
                                                                                <span class="flaticon-user font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="name">Full Name</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" aria-label="Full Name" aria-describedby="normalname" required="" data-msg="Please enter a valid name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="normalname">
                                                                                <span class="flaticon-browser-1 font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="signupSrEmail">Email</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Email" aria-label="Email" aria-describedby="signupEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="signupEmail">
                                                                                <span class="far fa-envelope font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="signupSrPassword">Password</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="password" class="form-control" name="password" id="signupSrPassword" placeholder="Password" aria-label="Password" aria-describedby="signupPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="signupPassword">
                                                                                <span class="flaticon-password font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->
                                                            <div class="mb-3 pb-1">
                                                                <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Register</button>
                                                            </div>
                                                            <div class="d-flex justify-content-between mb-1">
                                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox" id="customCheckboxInline2" name="customCheckboxInline2" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customCheckboxInline2">I have read and accept the <a href="#">Terms and Privacy Policy</a></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-two-code-sample" role="tabpanel" aria-labelledby="pills-two-code-sample-tab">
                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="puname">User Name</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="text" class="form-control" name="puname" id="puname" placeholder="User Name" aria-label="User Name" aria-describedby="partnerusername" required="" data-msg="Please enter a valid user name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="partnerusername">
                                                                                <span class="flaticon-user font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="pname">Full Name</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Full Name" aria-label="Full Name" aria-describedby="partnername" required="" data-msg="Please enter a valid name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="partnername">
                                                                                <span class="flaticon-browser-1 font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="signupPartnerSrEmail">Email</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="email" class="form-control" name="pemail" id="signupPartnerSrEmail" placeholder="Email" aria-label="Email" aria-describedby="signupPartnerEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="signupPartnerEmail">
                                                                                <span class="far fa-envelope font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="signupPartnerSrPassword">Password</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="password" class="form-control" name="Partnerpassword" id="signupPartnerSrPassword" placeholder="Password" aria-label="PartnerPassword" aria-describedby="signupPartnerPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="signupPartnerPassword">
                                                                                <span class="flaticon-password font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <!-- Form Group -->
                                                            <div class="form-group pb-1">
                                                                <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                                    <label class="sr-only" for="signupPartnerSrConfirmPassword">Confirm Password</label>
                                                                    <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                        <input type="password" class="form-control" name="confirmpartnerpassword" id="signupPartnerSrConfirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="signupPartnerConfirmPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="signupPartnerConfirmPassword">
                                                                                <span class="fas fa-key font-size-20"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Form Group -->

                                                            <div class="mb-3 pb-1">
                                                                <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Register</button>
                                                            </div>
                                                            <div class="d-flex justify-content-between mb-1">
                                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox" id="customCheckboxInline3" name="customCheckboxInline3" class="custom-control-input">
                                                                    <label class="custom-control-label" for="customCheckboxInline3">I have read and accept the <a href="#">Terms and Privacy Policy</a></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer p-0">
                                                    <div class="card-footer__top border-bottom border-color-8 py-3">
                                                        <div class="text-center mt-2 mb-4 pb-1">
                                                            <span class="d-block text-gray-1 fontsize-14">or continue with</span>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <a class="btn btn-block btn-sm btn-facebook transition-3d-hover" href="#">
                                                                <span class="fab fa-facebook-f mr-2"></span>
                                                                Facebook
                                                            </a>
                                                            <a class="btn btn-block btn-sm btn-twitter transition-3d-hover ml-5 mt-0" href="#">
                                                                <span class="fab fa-twitter mr-2"></span>
                                                                Twitter
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer__bottom p-4 text-center font-size-14">
                                                        <span class="text-gray-1">Already have an account?</span>
                                                        <a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Log In</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Signup -->

                                            <!-- Forgot Passwrd -->
                                            <div id="forgotPassword" style="opacity: 0; display: none;" data-target-group="idForm">
                                                <!-- Header -->
                                                <div class="card-header bg-light text-center py-3 px-5">
                                                    <h3 class="h6 mb-0 font-weight-semi-bold">Recover password</h3>
                                                </div>
                                                <!-- End Header -->
                                                <div class="card-body px-10 py-5">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="recoverSrEmail">Your email</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control" name="email" id="recoverSrEmail" placeholder="Your email" aria-label="Your email" aria-describedby="recoverEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="recoverEmail">
                                                                        <span class="far fa-envelope font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                    <div class="mb-2">
                                                        <button type="submit" class="btn btn-sm btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Recover Password</button>
                                                    </div>
                                                    <div class="text-center font-size-14">
                                                        <span class="text-gray-1">Remember your password?</span>
                                                        <a class="js-animation-link font-weight-bold" href="javascript:;" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Log In</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Forgot Passwrd -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative pl-3 language-switcher dropdown-connector-xl u-header__topbar-divider">
                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center ml-1 py-3" href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    <span class="d-inline-block">EUR</span>
                                </a>
                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right mt-0" aria-labelledby="languageDropdownInvoker">
                                    <a class="dropdown-item" href="#">USD</a>
                                    <a class="dropdown-item active" href="#">EUR</a>
                                    <a class="dropdown-item" href="#">TUR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== End HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
       
        <!-- ========== END MAIN CONTENT ========== -->


        <!-- Go to Top -->
        <a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
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
            $(window).on('load', function () {
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

            $(document).on('ready', function () {
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
