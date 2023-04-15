@extends('templates.layouts.mastercontact')

@section('title', 'Liên hệ')

@section('content')

    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-df26b5c elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="df26b5c" data-element_type="section"
            data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
            <div class="elementor-background-overlay"></div>
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-20558a88"
                    data-id="20558a88" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-45cdbdb8 elementor-widget elementor-widget-heading"
                            data-id="45cdbdb8" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.5.6 - 28-02-2022 */
                                    .elementor-heading-title {
                                        padding: 0;
                                        margin: 0;
                                        line-height: 1;
                                    }

                                    .elementor-widget-heading .elementor-heading-title[class*="elementor-size-"]>a {
                                        color: inherit;
                                        font-size: inherit;
                                        line-height: inherit;
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                        font-size: 15px;
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                        font-size: 19px;
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                        font-size: 29px;
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                        font-size: 39px;
                                    }

                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                        font-size: 59px;
                                    }
                                </style>
                                <h1 class="elementor-heading-title elementor-size-default">
                                    Liên hệ
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2bfe03a5 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="2bfe03a5" data-element_type="section"
            data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-623633c1"
                    data-id="623633c1" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-26d0d165 elementor-widget elementor-widget-heading"
                            data-id="26d0d165" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h3 class="elementor-heading-title elementor-size-default">
                                    Gửi cho chúng tôi
                                </h3>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-725b3c58 elementor-widget elementor-widget-heading"
                            data-id="725b3c58" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h1 class="elementor-heading-title elementor-size-default">
                                    Liên hệ
                                </h1>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-33929804 elementor-widget elementor-widget-heading"
                            data-id="33929804" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default">
                                    Nhận mọi thông tin hỗ trợ, phản ánh, đánh giá từ bạn
                                </p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-c6a25fa elementor-widget elementor-widget-cf7">
                            <div>
                                <div class="nd_elements_cf7_component">
                                    <div role="form" lang="en-US" dir="ltr">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success solid alert-dismissible fade show" style="color: #fff; background: #37D159; border-color: #37D159; border-radius: 1.375rem; padding: 0.5rem 1.5rem; border: 1px solid transparent;">
                                                <span><i class="mdi mdi-check"></i></span>
                                                <strong>{{ Session::get('success') }}</strong>

                                            </div>
                                        @else
                                            <form action="{{ route('route_BackEnd_Contact_Add') }}" method="post">
                                                @csrf
                                                <p>
                                                    <span class="wpcf7-form-control-wrap name-tx"><input type="text"
                                                            name="name" value="" size="40"
                                                            class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                                                            placeholder="Tên" /></span>
                                                    @error('name')
                                                    <div>
                                                        <p class="text-danger" style="color: red">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                <br />
                                                <span class="wpcf7-form-control-wrap email-634"><input type="email"
                                                        name="email" value="" placeholder="Email" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email"
                                                        aria-invalid="false" /></span>
                                                @error('email')
                                                    <div>
                                                        <p class="text-danger" style="color: red">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                <br />
                                                <span class="wpcf7-form-control-wrap email-634"><input type="text"
                                                        name="phone" value="" placeholder="Số điện thoại"
                                                        size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email"
                                                        aria-invalid="false" /></span>
                                                @error('phone')
                                                    <div>
                                                        <p class="text-danger" style="color: red">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                <br />
                                                <span class="wpcf7-form-control-wrap email-634"><input type="text"
                                                        name="title" value="" placeholder="Tiêu đề" size="40"
                                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email"
                                                        aria-invalid="false" /></span>
                                                @error('title')
                                                    <div>
                                                        <p class="text-danger" style="color: red">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                <br />
                                                <span class="wpcf7-form-control-wrap textarea-120">
                                                    <textarea name="content" cols="40" rows="8" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                                                        placeholder="Nội dung"></textarea>
                                                </span>
                                                @error('content')
                                                    <div>
                                                        <p class="text-danger" style="color: red">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                <br />
                                                <input type="submit" value="Gửi" />
                                                </p>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7daa58be"
                    data-id="7daa58be" data-element_type="column" data-settings='{"background_background":"classic"}'>
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-7caf7cd2 elementor-widget elementor-widget-google_maps"
                            data-id="7caf7cd2" data-element_type="widget" data-widget_type="google_maps.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.5.6 - 28-02-2022 */
                                    .elementor-widget-google_maps .elementor-widget-container {
                                        overflow: hidden;
                                    }

                                    .elementor-widget-google_maps iframe {
                                        height: 300px;
                                    }
                                </style>
                                <div class="elementor-custom-embed">
                                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.879706651303!2d105.78916183544312!3d21.03388927820622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab491747765b%3A0xa9f8ea5ceb74424e!2zNjIgUC4gVHLGsMahbmcgQ8O0bmcgR2lhaSwgROG7i2NoIFbhu41uZywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1681295404442!5m2!1svi!2s"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                        title="62 Trương Công Giai - Cầu Giấy - Hà Nội"
                                        aria-label="62 Trương Công Giai - Cầu Giấy - Hà Nội"></iframe>
                                </div>
                            </div>
                        </div>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-31b3764 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="31b3764" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-3ff8c07f"
                                    data-id="3ff8c07f" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-24591c48 elementor-widget elementor-widget-heading"
                                            data-id="24591c48" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    Địa chỉ:
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-5758924c"
                                    data-id="5758924c" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-6554944f elementor-widget elementor-widget-heading"
                                            data-id="6554944f" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    62 Trương Công Giai, Cầu Giấy
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-55d1da02"
                                    data-id="55d1da02" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-65e1776 elementor-widget elementor-widget-heading"
                                            data-id="65e1776" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    Số điện thoại:
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-7da44eaa"
                                    data-id="7da44eaa" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-2fd67b50 elementor-widget elementor-widget-heading"
                                            data-id="2fd67b50" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    0931 657 128
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-582dc9a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="582dc9a" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-1119fa01"
                                    data-id="1119fa01" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-4a5ffc3 elementor-widget elementor-widget-heading"
                                            data-id="4a5ffc3" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    Thành phố:
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-322b4e59"
                                    data-id="322b4e59" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-196ccbaa elementor-widget elementor-widget-heading"
                                            data-id="196ccbaa" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    Hà Nội
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-left: 9rem"
                                    class="elementor-column elementor-inner-column elementor-element elementor-element-212f580e"
                                    data-id="212f580e" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-0861f0c elementor-widget elementor-widget-heading"
                                            data-id="0861f0c" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    Email:
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-inner-column elementor-element elementor-element-7a2893b9"
                                    data-id="7a2893b9" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-4d7211eb elementor-widget elementor-widget-heading"
                                            data-id="4d7211eb" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <p class="elementor-heading-title elementor-size-default">
                                                    hotel.12zodiac@gmail.com
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
