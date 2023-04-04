@extends('templates.layouts.masterbookingsearch')

@section('title', $title)

@section('content')

    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-589f89f9 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="589f89f9" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7410219b"
                data-id="7410219b" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-1af726da elementor-widget elementor-widget-heading"
                        data-id="1af726da" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <style>
                                /*! elementor - v3.5.6 - 28-02-2022 */
                                .elementor-heading-title {
                                    padding: 0;
                                    margin: 0;
                                    line-height: 1
                                }

                                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                    color: inherit;
                                    font-size: inherit;
                                    line-height: inherit
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                    font-size: 15px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                    font-size: 19px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                    font-size: 29px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                    font-size: 39px
                                }

                                .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                    font-size: 59px
                                }
                            </style>
                            <h1 class="elementor-heading-title elementor-size-default">Search</h1>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-f23c8c7 elementor-widget elementor-widget-steps"
                        data-id="f23c8c7" data-element_type="widget" data-widget_type="steps.default">
                        <div class="elementor-widget-container">

                            <div class="nd_booking_section">
                                <!--start steps-->
                                <div class="nd_booking_section nd_booking_position_relative nd_booking_text_align_center">
                                    <ul class="nd_booking_list_style_none nd_booking_padding_0 nd_booking_margin_0">

                                        <li id="nd_booking_vc_steps_search"
                                            class="nd_booking_display_inline_block nd_booking_margin_right_20 nd_booking_margin_left_20">
                                            <h1
                                                class=" nd_booking_border_1_solid_white nd_booking_bg_greydark nd_booking_bg_custom_color nd_booking_border_1_solid_greydark_important nd_booking_width_20 nd_booking_height_20 nd_booking_line_height_20 nd_booking_font_size_10 nd_options_second_font nd_booking_display_inline_block nd_booking_border_radius_100_percentage nd_options_color_white nd_booking_margin_right_10">
                                                1</h1>
                                            <a class="nd_options_color_white nd_booking_font_size_12 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase nd_booking_cursor_text"
                                                href="#">Search</a>
                                        </li>
                                        <li id="nd_booking_vc_steps_booking"
                                            class="nd_booking_display_inline_block nd_booking_margin_right_20 nd_booking_margin_left_20">
                                            <h1
                                                class=" nd_booking_border_1_solid_white nd_booking_width_20 nd_booking_height_20 nd_booking_line_height_20 nd_booking_font_size_10 nd_options_second_font nd_booking_display_inline_block nd_booking_border_radius_100_percentage nd_options_color_white nd_booking_margin_right_10">
                                                2</h1>
                                            <a class="nd_options_color_white nd_booking_font_size_12 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase nd_booking_cursor_text"
                                                href="#">Booking</a>
                                        </li>
                                        <li id="nd_booking_vc_steps_checkout"
                                            class="nd_booking_display_inline_block nd_booking_margin_right_20 nd_booking_margin_left_20">
                                            <h1
                                                class=" nd_booking_border_1_solid_white nd_booking_width_20 nd_booking_height_20 nd_booking_line_height_20 nd_booking_font_size_10 nd_options_second_font nd_booking_display_inline_block nd_booking_border_radius_100_percentage nd_options_color_white nd_booking_margin_right_10">
                                                3</h1>
                                            <a class="nd_options_color_white nd_booking_font_size_12 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase nd_booking_cursor_text"
                                                href="#">Checkout</a>
                                        </li>
                                        <li id="nd_booking_vc_steps_thankyou"
                                            class="nd_booking_display_inline_block nd_booking_margin_right_20 nd_booking_margin_left_20">
                                            <h1
                                                class=" nd_booking_border_1_solid_white nd_booking_width_20 nd_booking_height_20 nd_booking_line_height_20 nd_booking_font_size_10 nd_options_second_font nd_booking_display_inline_block nd_booking_border_radius_100_percentage nd_options_color_white nd_booking_margin_right_10">
                                                4</h1>
                                            <a class="nd_options_color_white nd_booking_font_size_12 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase nd_booking_cursor_text"
                                                href="#">Thank You</a>
                                        </li>

                                    </ul>
                                </div>
                                <!--end steps-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-f9d1461 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="f9d1461" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0df10ee"
                data-id="0df10ee" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-e7cb453 elementor-widget elementor-widget-shortcode"
                        data-id="e7cb453" data-element_type="widget" data-widget_type="shortcode.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-shortcode">


                                <div class="nd_booking_section">

                                    <div id="nd_booking_search_cpt_1_sidebar"
                                        class="nd_booking_float_left nd_booking_width_33_percentage nd_booking_box_sizing_border_box nd_booking_width_100_percentage_responsive">


                                        <!--START FORM-->


                                        <div
                                            class="nd_booking_section nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_box_sizing_border_box">

                                            <form action="{{ route('route_FontEnd_BookingSearch_Search') }}"
                                                method="post">
                                                @csrf
                                                <div id="nd_booking_search_main_bg"
                                                    class="nd_booking_section nd_booking_bg_greydark nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_box_sizing_border_box">


                                                    <!--branches-->
                                                    <div id="nd_booking_search_cpt_1_form_branches"
                                                        class="  nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_box_sizing_border_box">
                                                        <!--START ul-->
                                                        <ul class="nd_booking_branch_ul_1 nd_booking_bg_greydark_2">

                                                            <li class="nd_booking_branch_select_active">
                                                                <h3 class="nd_options_color_white">
                                                                    Lựa Chọn Của Bạn</h3>
                                                                <img class="nd_booking_branch_ul_1_arrow" alt=""
                                                                    width="12"
                                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-down-arrow-white.svg">
                                                            </li>


                                                        </ul>

                                                        <style>
                                                            .nd_booking_branch_ul_1 {
                                                                margin: 0px;
                                                                padding: 0px;
                                                                position: relative;
                                                            }

                                                            .nd_booking_branch_ul_1>li {
                                                                display: none;
                                                            }

                                                            .nd_booking_branch_ul_1 .nd_booking_branch_select_active {
                                                                display: block;
                                                            }

                                                            .nd_booking_display_block_important {
                                                                display: block !important;
                                                            }

                                                            .nd_booking_branch_ul_1>li {
                                                                padding: 20px 20px 35px 20px;
                                                                box-sizing: border-box;
                                                                position: relative;
                                                                text-align: center;
                                                            }

                                                            .nd_booking_branch_ul_1_arrow {
                                                                position: absolute;
                                                                bottom: 15px;
                                                                left: 50%;
                                                                margin-left: -6px;
                                                            }

                                                            .nd_booking_branch_select_sub_menu {
                                                                display: none;
                                                                position: absolute;
                                                                top: 0px;
                                                                left: 0px;
                                                                margin: 0px;
                                                                padding: 0px;
                                                                list-style: none;
                                                                text-align: center;
                                                                cursor: pointer;
                                                                min-width: 300px;
                                                                width: 100%;
                                                                z-index: 9;
                                                            }

                                                            .nd_booking_branch_select_sub_menu li {
                                                                border-top-width: 0px;
                                                                padding: 14px 20px;
                                                                box-sizing: border-box;
                                                                position: relative;
                                                            }
                                                        </style>

                                                        <script type="text/javascript">
                                                            //<![CDATA[
                                                            jQuery(document).ready(function() {

                                                                jQuery(function($) {

                                                                    $("  .nd_booking_branch_select_sub_menu li ").click(function() {

                                                                        $("  .nd_booking_branch_ul_1 li").removeClass(
                                                                            "nd_booking_branch_select_active");
                                                                        var nd_booking_select_data_position_first = $(this).attr("data-position");
                                                                        var nd_booking_select_data_branch_id = $(this).attr("data-id");
                                                                        var nd_booking_select_data_position = parseInt(
                                                                            nd_booking_select_data_position_first) + 1;
                                                                        $("  .nd_booking_branch_ul_1 > li:nth-child(" +
                                                                            nd_booking_select_data_position + ")").addClass(
                                                                            "nd_booking_branch_select_active");

                                                                        $("  .nd_booking_branch_select_sub_menu").removeClass(
                                                                            "nd_booking_display_block_important");

                                                                        $("#nd_booking_archive_form_branches").val(nd_booking_select_data_branch_id);
                                                                        nd_booking_sorting(1);

                                                                    });

                                                                    $("  .nd_booking_branch_ul_1 li.nd_booking_branch_select_active").click(function() {
                                                                        $("  .nd_booking_branch_select_sub_menu").addClass(
                                                                            "nd_booking_display_block_important");
                                                                    });

                                                                    $("  .nd_booking_branch_ul_1")

                                                                        .mouseenter(function() {
                                                                            $("  .nd_booking_branch_select_sub_menu").addClass(
                                                                                "nd_booking_display_block_important");
                                                                        })
                                                                        .mouseleave(function() {
                                                                            $("  .nd_booking_branch_select_sub_menu").removeClass(
                                                                                "nd_booking_display_block_important");
                                                                        });

                                                                });

                                                            });
                                                            //]]&gt;
                                                        </script>
                                                        <!--END ul-->

                                                    </div>
                                                    <!--branches-->


                                                    <!--check in/out-->
                                                    <div id="nd_booking_search_cpt_1_form_checkin"
                                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">


                                                        <div id="nd_booking_open_calendar_from"
                                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
                                                            <div
                                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                                <h6
                                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                                    Ngày Đến</h6>
                                                                <div class="nd_booking_section nd_booking_height_15">
                                                                </div>
                                                                <div class="nd_booking_display_inline_flex ">
                                                                    <div
                                                                        class="nd_booking_float_left nd_booking_text_align_right">
                                                                        <h1 id="nd_booking_date_number_from_front"
                                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important">
                                                                            @if ($check_in)
                                                                                {{ date('d', $check_in) }}
                                                                            @else
                                                                                {{ date('d') }}
                                                                            @endif
                                                                        </h1>
                                                                    </div>
                                                                    <div
                                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                                        <h6 id="nd_booking_date_month_from_front"
                                                                            class="nd_booking_color_yellow_important  nd_booking_margin_top_7 nd_booking_font_size_12">
                                                                            @if ($check_in)
                                                                                {{ date('M', $check_in) }}
                                                                            @else
                                                                                {{ date('M') }}
                                                                            @endif
                                                                        </h6>
                                                                        <div
                                                                            class="nd_booking_section nd_booking_height_5">
                                                                        </div>
                                                                        <img alt="" width="12"
                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-down-arrow-white.svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="nd_booking_date_month_from"
                                                            class="nd_booking_section nd_booking_margin_top_20">
                                                        <input type="hidden" id="nd_booking_date_number_from"
                                                            class="nd_booking_section nd_booking_margin_top_20">
                                                        <input placeholder="Check In"
                                                            class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                                            type="text" name="check_in"
                                                            id="nd_booking_archive_form_date_range_from"
                                                            value="{{ date('Y-m-d', $check_in) }}" />
                                                    </div>
                                                    <div id="nd_booking_search_cpt_1_form_checkout"
                                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">

                                                        <div id="nd_booking_open_calendar_to"
                                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
                                                            <div
                                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                                <h6
                                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                                    Ngày Đi</h6>
                                                                <div class="nd_booking_section nd_booking_height_15">
                                                                </div>
                                                                <div class="nd_booking_display_inline_flex ">
                                                                    <div
                                                                        class="nd_booking_float_left nd_booking_text_align_right">
                                                                        <h1 id="nd_booking_date_number_to_front"
                                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important">
                                                                            @if ($check_out)
                                                                                {{ date('d', $check_out) }}
                                                                            @else
                                                                                {{ date('d') }}
                                                                            @endif
                                                                        </h1>
                                                                    </div>
                                                                    <div
                                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                                        <h6 id="nd_booking_date_month_to_front"
                                                                            class="nd_booking_color_yellow_important  nd_booking_margin_top_7 nd_booking_font_size_12">
                                                                            @if ($check_out)
                                                                                {{ date('M', $check_out) }}
                                                                            @else
                                                                                {{ date('M') }}
                                                                            @endif
                                                                        </h6>
                                                                        <div
                                                                            class="nd_booking_section nd_booking_height_5">
                                                                        </div>
                                                                        <img alt="" width="12"
                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-down-arrow-white.svg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <input type="hidden" id="nd_booking_date_month_to"
                                                            class="nd_booking_section nd_booking_margin_top_20">
                                                        <input type="hidden" id="nd_booking_date_number_to"
                                                            class="nd_booking_section nd_booking_margin_top_20">
                                                        <input placeholder="Check Out"
                                                            class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_responsive nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                                            type="text" name="check_out"
                                                            id="nd_booking_archive_form_date_range_to"
                                                            value="{{ date('Y-m-d', $check_out) }}" />

                                                    </div>

                                                    <script type="text/javascript">
                                                        //<![CDATA[
                                                        jQuery(document).ready(function() {

                                                            jQuery(function($) {

                                                                $("#nd_booking_archive_form_date_range_from").datepicker({
                                                                    defaultDate: "+1w",
                                                                    minDate: 0,
                                                                    altField: "#nd_booking_date_month_from",
                                                                    altFormat: "M",
                                                                    firstDay: 0,
                                                                    dateFormat: "mm/dd/yy",
                                                                    monthNames: ["January", "February", "March", "April", "May", "June", "July",
                                                                        "August", "September", "October", "November", "December"
                                                                    ],
                                                                    monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                                                        "Oct", "Nov", "Dec"
                                                                    ],
                                                                    dayNamesMin: ["SU", "MO", "TU", "WE", "TH", "FR", "SA"],
                                                                    nextText: "NEXT",
                                                                    prevText: "PREV",
                                                                    changeMonth: false,
                                                                    numberOfMonths: 1,
                                                                    onClose: function() {
                                                                        var minDate = $(this).datepicker("getDate");
                                                                        var newMin = new Date(minDate.setDate(minDate.getDate() + 1));
                                                                        $("#nd_booking_archive_form_date_range_to").datepicker("option",
                                                                            "minDate", newMin);

                                                                        var nd_booking_input_date_from = $(
                                                                            "#nd_booking_archive_form_date_range_from").val();
                                                                        var nd_booking_date_number_from = nd_booking_input_date_from.substring(
                                                                            3, 5);
                                                                        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
                                                                        var nd_booking_input_date_to = $(
                                                                            "#nd_booking_archive_form_date_range_to").val();
                                                                        var nd_booking_date_number_to = nd_booking_input_date_to.substring(3,
                                                                            5);
                                                                        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

                                                                        $("#nd_booking_date_number_from_front").text(
                                                                            nd_booking_date_number_from);
                                                                        var nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
                                                                        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

                                                                        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
                                                                        var nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
                                                                        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

                                                                        nd_booking_get_nights();
                                                                        nd_booking_sorting(1);

                                                                    }
                                                                });


                                                                $("#nd_booking_archive_form_date_range_to").datepicker({
                                                                    defaultDate: "+1w",
                                                                    altField: "#nd_booking_date_month_to",
                                                                    altFormat: "M",
                                                                    minDate: "+1d",
                                                                    monthNames: ["January", "February", "March", "April", "May", "June", "July",
                                                                        "August", "September", "October", "November", "December"
                                                                    ],
                                                                    monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                                                        "Oct", "Nov", "Dec"
                                                                    ],
                                                                    dayNamesMin: ["SU", "MO", "TU", "WE", "TH", "FR", "SA"],
                                                                    nextText: "NEXT",
                                                                    prevText: "PREV",
                                                                    changeMonth: false,
                                                                    firstDay: 0,
                                                                    dateFormat: "mm/dd/yy",
                                                                    numberOfMonths: 1,
                                                                    onClose: function() {

                                                                        var nd_booking_input_date_from = $(
                                                                            "#nd_booking_archive_form_date_range_from").val();
                                                                        var nd_booking_date_number_from = nd_booking_input_date_from.substring(
                                                                            3, 5);
                                                                        $("#nd_booking_date_number_from").val(nd_booking_date_number_from);
                                                                        var nd_booking_input_date_to = $(
                                                                            "#nd_booking_archive_form_date_range_to").val();
                                                                        var nd_booking_date_number_to = nd_booking_input_date_to.substring(3,
                                                                            5);
                                                                        $("#nd_booking_date_number_to").val(nd_booking_date_number_to);

                                                                        $("#nd_booking_date_number_from_front").text(
                                                                            nd_booking_date_number_from);
                                                                        var nd_booking_date_month_from = $("#nd_booking_date_month_from").val();
                                                                        $("#nd_booking_date_month_from_front").text(nd_booking_date_month_from);

                                                                        $("#nd_booking_date_number_to_front").text(nd_booking_date_number_to);
                                                                        var nd_booking_date_month_to = $("#nd_booking_date_month_to").val();
                                                                        $("#nd_booking_date_month_to_front").text(nd_booking_date_month_to);

                                                                        nd_booking_get_nights();
                                                                        nd_booking_sorting(1);

                                                                    }
                                                                });

                                                                $("#nd_booking_archive_form_date_range_from").datepicker("setDate", "+0");
                                                                $("#nd_booking_archive_form_date_range_to").datepicker("setDate", "+1");

                                                                function nd_booking_get_nights() {
                                                                    var nd_booking_archive_form_date_range_from = $(
                                                                        "#nd_booking_archive_form_date_range_from").val();
                                                                    var nd_booking_archive_form_date_range_to = $("#nd_booking_archive_form_date_range_to")
                                                                        .val();
                                                                    var nd_booking_start = new Date(nd_booking_archive_form_date_range_from);
                                                                    var nd_booking_end = new Date(nd_booking_archive_form_date_range_to);
                                                                    var nd_booking_nights_number = Math.round((nd_booking_end - nd_booking_start) / 1000 /
                                                                        60 / 60 / 24);
                                                                    $(".nd_booking_nights_number").text(nd_booking_nights_number);
                                                                }

                                                                $("#nd_booking_open_calendar_from").click(function() {
                                                                    $("#nd_booking_archive_form_date_range_from").datepicker("show");
                                                                });
                                                                $("#nd_booking_open_calendar_to").click(function() {
                                                                    $("#nd_booking_archive_form_date_range_to").datepicker("show");
                                                                });

                                                            });

                                                        });
                                                        //]]&gt;
                                                    </script>
                                                    <!--check in/out-->


                                                    <!--guests-->
                                                    <div id="nd_booking_search_cpt_1_form_guests"
                                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
                                                        <div id="nd_booking_search_guests_bg"
                                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                            <div
                                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                                <h6
                                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                                    Số Người</h6>
                                                                <div class="nd_booking_section nd_booking_height_15">
                                                                </div>
                                                                <div class="nd_booking_display_inline_flex ">
                                                                    <div
                                                                        class="nd_booking_float_left nd_booking_text_align_right">
                                                                        <h1
                                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_guests_number">
                                                                            {{ $people }}</h1>
                                                                    </div>
                                                                    <div
                                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                                        <div
                                                                            class="nd_booking_section nd_booking_height_7">
                                                                        </div>
                                                                        <div class="nd_booking_section">
                                                                            <img class="nd_booking_float_right nd_booking_guests_increase nd_booking_cursor_pointer"
                                                                                style="transform: rotate(180deg);"
                                                                                alt="" width="12"
                                                                                src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-down-arrow-white.svg">
                                                                        </div>
                                                                        <div
                                                                            class="nd_booking_section nd_booking_height_10">
                                                                        </div>
                                                                        <div class="nd_booking_section">
                                                                            <img class="nd_booking_float_right nd_booking_guests_decrease nd_booking_cursor_pointer"
                                                                                alt="" width="12"
                                                                                src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-down-arrow-white.svg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label class="nd_booking_display_none"
                                                            for="nd_booking_archive_form_guests">Guests
                                                            :</label>
                                                        <input placeholder="Guests"
                                                            class="nd_booking_section nd_booking_display_none"
                                                            type="number" name="people"
                                                            id="nd_booking_archive_form_guests"
                                                            value="{{ $people }}" />
                                                    </div>
                                                    <script type="text/javascript">
                                                        //<![CDATA[
                                                        jQuery(document).ready(function() {

                                                            jQuery(function($) {

                                                                $(".nd_booking_guests_increase").click(function() {
                                                                    var value = $(".nd_booking_guests_number").text();
                                                                    value++;
                                                                    $(".nd_booking_guests_number").text(value);
                                                                    $("#nd_booking_archive_form_guests").val(value);
                                                                    nd_booking_sorting(1);
                                                                });

                                                                $(".nd_booking_guests_decrease").click(function() {
                                                                    var value = $(".nd_booking_guests_number").text();

                                                                    if (value > 1) {
                                                                        value--;
                                                                        $(".nd_booking_guests_number").text(value);
                                                                        $("#nd_booking_archive_form_guests").val(value);
                                                                        nd_booking_sorting(1);
                                                                    }

                                                                });

                                                            });

                                                        });
                                                        //]]&gt;
                                                    </script>
                                                    <!--guests-->


                                                    <!--night info-->
                                                    <div id="nd_booking_search_cpt_1_form_nights"
                                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_responsive nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
                                                        <div id="nd_booking_search_nights_bg"
                                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                            <div
                                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                                <h6
                                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                                    Số ngày</h6>
                                                                <div class="nd_booking_section nd_booking_height_15">
                                                                </div>
                                                                <div class="nd_booking_display_inline_flex ">
                                                                    <div
                                                                        class="nd_booking_float_left nd_booking_text_align_right">
                                                                        <h1
                                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_nights_number">
                                                                            {{ ($check_out - $check_in) / 86400 }}</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--night info-->

                                                    <div class="">
                                                        <!--submit button-->
                                                        <input
                                                            style=" border:2px solid #6b6978; color:#6b6978;margin-left:90px"
                                                            class=" nd_booking_float_left nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2 "
                                                            type="submit" value="Tìm Kiếm">
                                                    </div>
                                                </div>

                                            </form>

                                        </div>

                                        <script type="text/javascript">
                                            //<![CDATA[
                                            jQuery(document).ready(function() {

                                                jQuery(function($) {

                                                    $("#nd_booking_slider_range").slider({
                                                        range: "min",
                                                        value: 300,
                                                        min: 1,
                                                        max: 700,
                                                        slide: function(event, ui) {
                                                            $("#nd_booking_archive_form_max_price_for_day").val("" + ui.value);
                                                        },
                                                        change: function(event, ui) {
                                                            nd_booking_sorting(1);
                                                        }
                                                    });
                                                    $("#nd_booking_archive_form_max_price_for_day").val("" + $("#nd_booking_slider_range")
                                                        .slider("value"));

                                                });

                                            });
                                            //]]&gt;
                                        </script>

                                        <style>
                                            #nd_booking_slider_range {
                                                background-color: #e4e4e4;
                                                height: 4px;
                                                position: relative;
                                                margin-top: 20px;
                                            }

                                            #nd_booking_slider_range .ui-slider-range {
                                                height: 4px;
                                            }

                                            #nd_booking_slider_range .ui-slider-handle {
                                                height: 16px;
                                                width: 16px;
                                                position: absolute;
                                                top: -6px;
                                                cursor: pointer;
                                                outline: 0;
                                            }

                                            #nd_booking_archive_form_max_price_for_day {
                                                color: #1c1c1c;
                                                background-color: transparent;
                                                font-size: 20px;
                                                width: 50px;
                                                text-align: right;
                                                padding: 0px;
                                            }
                                        </style>
                                        <!--normal service-->


                                        </form>
                                        <!--END FORM-->


                                    </div>
                                    <style>
                                        .custom-table-room {
                                            margin: 14px;
                                            border: 1px solid #f1f1f1;
                                            text-align: center
                                        }

                                        .custom-table-room-table {
                                            width: 100%;
                                        }

                                        .custom-table-room-table>thead>tr>th {
                                            border-bottom: 1px solid #f1f1f1;
                                            border-right: 1px solid #f1f1f1;
                                        }

                                        .custom-table-room-table>tbody>tr>td {
                                            border-bottom: 1px solid #f1f1f1;
                                            border-right: 1px solid #f1f1f1;
                                        }
                                    </style>
                                    <div id="nd_booking_search_cpt_1_content"
                                        class="nd_booking_float_left nd_booking_width_66_percentage nd_booking_box_sizing_border_box nd_booking_width_100_percentage_responsive">
                                        <div class="custom-table-room">
                                            <table class="custom-table-room-table">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên phòng</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Số người</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($listRooms as $item)
                                                        <tr id="showListRoom_{{ $item->id }}"></tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div>
                                                <p id="showpeople"></p>
                                            </div>
                                        </div>
                                        <div style="float: right">
                                            <form action="{{ route('route_FontEnd_Booking_Booking') }}" method="post">
                                                @csrf
                                                <input type="date" name="check_in"
                                                    value="{{ date('Y-m-d', $check_in) }}" hidden>
                                                <input type="date" name="check_out"
                                                    value="{{ date('Y-m-d', $check_out) }}" hidden>
                                                <input type="text" name="people" value="{{ $people }}" hidden>
                                                <input type="text" id="postDataRoom" name="rooms" hidden>
                                                <button type="submit" style="margin-right: 25px">Đặt phòng</button>
                                            </form>
                                        </div>

                                        <div id="nd_booking_archive_search_masonry_container"
                                            class="nd_booking_section nd_booking_position_relative">

                                            <div id="nd_booking_content_result" class="nd_booking_section">

                                                <!--<h3>Results Founded : 6</h3>-->
                                                <script>
                                                    localStorage.clear();
                                                    localStorage.setItem('people', 0);
                                                </script>
                                                <div class="nd_booking_section nd_booking_masonry_content">
                                                    <?php $i = 1; ?>
                                                    @foreach ($listRooms as $room)
                                                        
                                                        @foreach ($cateRooms as $index => $item)
                                                            @if ($room->id == $index)
                                                                <div id="nd_booking_archive_cpt_1_single_5649"
                                                                    class="nd_booking_masonry_item nd_booking_width_50_percentage nd_booking_width_100_percentage_responsive">

                                                                    <div
                                                                        class="nd_booking_section nd_booking_padding_15 nd_booking_box_sizing_border_box">

                                                                        <div
                                                                            class="nd_booking_section nd_booking_border_1_solid_grey nd_booking_bg_white">


                                                                            <div
                                                                                class="nd_booking_section nd_booking_position_relative">


                                                                                <span
                                                                                    class="nd_options_color_white nd_booking_font_size_10 nd_booking_line_height_10 nd_booking_letter_spacing_2 nd_booking_padding_3_5 nd_booking_padding_top_5 nd_booking_top_10 nd_booking_position_absolute nd_booking_right_10 nd_booking_bg_color_3">Tầng
                                                                                    {{ $room->floor }}</span>

                                                                                <img alt=""
                                                                                    class="nd_booking_section"
                                                                                    src="{{ asset('storage/' . $room->image) }}">

                                                                                <div
                                                                                    class="nd_booking_bg_greydark_alpha_gradient_3 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                                                                    <div
                                                                                        class="nd_booking_position_absolute nd_booking_bottom_20">
                                                                                        <p
                                                                                            class="nd_options_color_white nd_booking_margin_right_10 nd_booking_float_left nd_booking_font_size_11 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase">
                                                                                            Hotel
                                                                                            Rome</p><img alt=""
                                                                                            class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                                            width="10"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-star-full-white.svg"><img
                                                                                            alt=""
                                                                                            class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                                            width="10"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-star-full-white.svg"><img
                                                                                            alt=""
                                                                                            class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                                            width="10"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-star-full-white.svg"><img
                                                                                            alt=""
                                                                                            class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                                            width="10"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-star-full-white.svg"><img
                                                                                            alt=""
                                                                                            class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                                            width="10"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-star-full-white.svg">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div
                                                                                class="nd_booking_section nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                                                                <a
                                                                                    href="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/rooms/small-room/">
                                                                                    <h1>{{ $room->name }}
                                                                                    </h1>
                                                                                </a>
                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_10">
                                                                                </div>

                                                                                <div class="nd_booking_section">
                                                                                    <div
                                                                                        class="nd_booking_display_table nd_booking_float_left">
                                                                                        <img alt=""
                                                                                            class="nd_booking_margin_right_10 nd_booking_display_table_cell nd_booking_vertical_align_middle"
                                                                                            width="23"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-user-grey.svg">
                                                                                        <p
                                                                                            class="  nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_font_size_12 nd_booking_line_height_26">
                                                                                            {{ $room->adult }}
                                                                                            Người</p>
                                                                                        <img alt=""
                                                                                            class="nd_booking_margin_right_10 nd_booking_margin_left_20 nd_booking_display_table_cell nd_booking_vertical_align_middle"
                                                                                            width="20"
                                                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-plan-grey.svg">
                                                                                        <p
                                                                                            class="  nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_font_size_12 nd_booking_line_height_26">
                                                                                            {{ $room->bed }}
                                                                                            Giường</p>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_20">
                                                                                </div>
                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_20">
                                                                                </div>
                                                                                <div id="nd_booking_book_room_5649">
                                                                                    <p id="showerror_{{ $room->id }}"
                                                                                        style="color:red;"></p>
                                                                                    <a id="showSlRoom_{{ $room->id }}"
                                                                                        style=" border:2px solid #6b6978; color:#6b6978; margin:0 20px 0 15px; padding: 5px"></a>
                                                                                    <script>
                                                                                        localStorage.setItem('slRoom_{{ $room->id }}', {{ $item }})
                                                                                        document.getElementById('showSlRoom_{{ $room->id }}').innerHTML = 'SL: ' + localStorage.getItem(
                                                                                            'slRoom_{{ $room->id }}');
                                                                                        localStorage.setItem('countRoom_{{ $room->id }}', 0);
                                                                                    </script>
                                                                                    <button type="submit"
                                                                                        id="button_quantity_room_{{ $room->id }}"
                                                                                        style=" border:2px solid #6b6978; background-color: white; color:#6b6978; padding: 10px; font-size: 20px">Đặt
                                                                                        phòng ngay</button>
                                                                                    <script type="text/javascript">
                                                                                        let button_quantity_room_{{ $room->id }} = document.getElementById(
                                                                                            'button_quantity_room_{{ $room->id }}');
                                                                                        button_quantity_room_{{ $room->id }}.onclick = function() {
                                                                                            if (localStorage.getItem('people') <= Number({{ $people }})) {
                                                                                                if (localStorage.getItem('slRoom_{{ $room->id }}') > 0) {
                                                                                                    localStorage.setItem('slRoom_{{ $room->id }}', Number(localStorage.getItem(
                                                                                                        'slRoom_{{ $room->id }}')) - 1);
                                                                                                    document.getElementById('showSlRoom_{{ $room->id }}').innerHTML = 'SL: ' + localStorage
                                                                                                        .getItem('slRoom_{{ $room->id }}');
                                                                                                    localStorage.setItem('countRoom_{{ $room->id }}', Number(localStorage.getItem(
                                                                                                        'countRoom_{{ $room->id }}')) + 1);
                                                                                                    localStorage.setItem('people', Number(localStorage.getItem('people')) + Number(
                                                                                                        {{ $room->adult }}));
                                                                                                    document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people');
                                                                                                    if (localStorage.getItem('slRoom_{{ $room->id }}') == 0) {
                                                                                                        document.getElementById('showerror_{{ $room->id }}').innerHTML = '{{ $room->name }}' +
                                                                                                            ' đã hết xin vui lòng chọn phòng khác!';
                                                                                                    }
                                                                                                    document.getElementById('showListRoom_{{ $room->id }}').innerHTML = '<td>' +
                                                                                                        '{{ $i++ }}' + '</td>' + '<td>' + '{{ $room->name }}' + '</td>' + '<td>' +
                                                                                                        '{{ $room->image }}' + '</td>' + '<td>' + '{{ $room->adult }}' + '</td>' + '<td>' +
                                                                                                        '{{ $room->price . ' đ' }}' + '</td>' + '<td id="show_count_room_{{ $room->id }}">' +
                                                                                                        localStorage.getItem('countRoom_{{ $room->id }}') + '</td>' + '<td>' +
                                                                                                        '<button tyle="submit" onclick="delete{{ $room->id }}Room()">' + 'Xóa' + '</button>' +
                                                                                                        '</td>';
                                                                                                    saveRoom();
                                                                                                }
                                                                                            }
                                                                                            if (localStorage.getItem('people') >= Number({{ $people }}) && localStorage.getItem('people') <=
                                                                                                {{ (int) $people + 3 }}) {
                                                                                                document.getElementById("showpeople").style.color = 'green';
                                                                                            } else {
                                                                                                document.getElementById("showpeople").style.color = 'red';
                                                                                                if (localStorage.getItem('people') < Number({{ $people }})) {
                                                                                                    document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people') +
                                                                                                        '<br>' + 'Số lượng người chưa đủ!';
                                                                                                } else {
                                                                                                    document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people') +
                                                                                                        '<br>' + 'Số lượng người đã lớn hơn số lượng đặt!';
                                                                                                }
                                                                                            }
                                                                                        };

                                                                                        function delete{{ $room->id }}Room() {
                                                                                            if (localStorage.getItem('countRoom_{{ $room->id }}') > 0) {
                                                                                                document.getElementById('showerror_{{ $room->id }}').innerHTML = '';
                                                                                                localStorage.setItem('slRoom_{{ $room->id }}', Number(localStorage.getItem(
                                                                                                    'slRoom_{{ $room->id }}')) + 1);
                                                                                                document.getElementById('showSlRoom_{{ $room->id }}').innerHTML = 'SL: ' + localStorage.getItem(
                                                                                                    'slRoom_{{ $room->id }}');
                                                                                                localStorage.setItem('countRoom_{{ $room->id }}', Number(localStorage.getItem(
                                                                                                    'countRoom_{{ $room->id }}')) - 1);
                                                                                                localStorage.setItem('people', Number(localStorage.getItem('people')) - Number({{ $room->adult }}));
                                                                                                document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people');
                                                                                                saveRoom();
                                                                                                if (localStorage.getItem('countRoom_{{ $room->id }}') == 0) {
                                                                                                    document.getElementById('showListRoom_{{ $room->id }}').innerHTML = '';
                                                                                                } else {
                                                                                                    document.getElementById('show_count_room_{{ $room->id }}').innerHTML = localStorage.getItem(
                                                                                                        'countRoom_{{ $room->id }}')
                                                                                                }
                                                                                            }
                                                                                            if (localStorage.getItem('people') >= Number({{ $people }}) && localStorage.getItem('people') <=
                                                                                                {{ (int) $people + 3 }}) {
                                                                                                document.getElementById("showpeople").style.color = 'green';
                                                                                            } else {
                                                                                                document.getElementById("showpeople").style.color = 'red';
                                                                                                if (localStorage.getItem('people') < Number({{ $people }})) {
                                                                                                    document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people') +
                                                                                                        '<br>' + 'Số lượng người chưa đủ!';
                                                                                                } else {
                                                                                                    document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people') +
                                                                                                        '<br>' + 'Số lượng người đã lớn hơn số lượng đặt!';
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                </div>
                                                                                <!--START all info-->
                                                                                <style>
                                                                                    .nd_booking_info_btn {
                                                                                        width: 45px;
                                                                                        height: 45px;
                                                                                        float: left;
                                                                                        position: relative;
                                                                                    }

                                                                                    .nd_booking_info_btn_image {
                                                                                        width: 12px;
                                                                                        position: absolute;
                                                                                        left: 15px;
                                                                                        top: 15px;
                                                                                    }

                                                                                    .nd_booking_info_btn:hover .nd_booking_info_content {
                                                                                        display: block;
                                                                                    }

                                                                                    .nd_booking_info_content {
                                                                                        display: none;
                                                                                        width: 250px;
                                                                                        position: absolute;
                                                                                        bottom: 45px;
                                                                                        z-index: 9;
                                                                                        margin-left: -104px;
                                                                                        padding-bottom: 20px;
                                                                                    }

                                                                                    .nd_booking_info_table {
                                                                                        width: 100%;
                                                                                        float: left;
                                                                                        padding: 0px;
                                                                                    }

                                                                                    .nd_booking_info_table table {
                                                                                        width: 100%;
                                                                                        float: left;
                                                                                        text-align: center;
                                                                                        font-size: 10px;
                                                                                        letter-spacing: 2px;
                                                                                        color: #fff;
                                                                                    }

                                                                                    .nd_booking_info_table tr td {
                                                                                        padding: 5px;
                                                                                    }

                                                                                    .nd_booking_info_table_triangle {
                                                                                        width: 100%;
                                                                                        overflow: hidden;
                                                                                        box-sizing: border-box;
                                                                                        text-align: center;
                                                                                        line-height: 10px;
                                                                                        margin-bottom: -10px;
                                                                                    }

                                                                                    .nd_booking_info_table_triangle:after {
                                                                                        content: "";
                                                                                        display: inline-block;
                                                                                        width: 0px;
                                                                                        height: 0px;
                                                                                        border-left: 10px solid transparent;
                                                                                        border-right: 10px solid transparent;
                                                                                        border-top: 10px solid #444444;
                                                                                        line-height: 10px;
                                                                                    }

                                                                                    .nd_booking_info_table table tr.nd_booking_info_table_first {
                                                                                        font-weight: bolder;
                                                                                    }

                                                                                    .nd_booking_info_table table tr.nd_booking_info_table_last td:last-child {
                                                                                        border-top: double;
                                                                                    }
                                                                                </style>

                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_20">
                                                                                </div>
                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_1 nd_booking_border_bottom_1_solid_grey">
                                                                                </div>
                                                                                <div
                                                                                    class="nd_booking_section nd_booking_height_20">
                                                                                </div>
                                                                                <a title="Swimming Pool"
                                                                                    class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                                                                        loading="lazy" alt="Swimming Pool"
                                                                                        class="nd_booking_margin_right_15 nd_booking_float_left"
                                                                                        width="23" height="23"
                                                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/hotel/wp-content/uploads/sites/2/2022/04/swmming-pool.png"></a>

                                                                                <a title="Television"
                                                                                    class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                                                                        loading="lazy" alt="Television"
                                                                                        class="nd_booking_margin_right_15 nd_booking_float_left"
                                                                                        width="23" height="23"
                                                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/hotel/wp-content/uploads/sites/2/2022/04/television.png"></a>

                                                                                <a title="No Smoking"
                                                                                    class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                                                                        loading="lazy" alt="No Smoking"
                                                                                        class="nd_booking_margin_right_15 nd_booking_float_left"
                                                                                        width="23" height="23"
                                                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/hotel/wp-content/uploads/sites/2/2022/04/no-smoking.png"></a>

                                                                                <a title="Private Bathroom"
                                                                                    class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                                                                        loading="lazy"
                                                                                        alt="Private Bathroom"
                                                                                        class="nd_booking_margin_right_15 nd_booking_float_left"
                                                                                        width="23" height="23"
                                                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/hotel/wp-content/uploads/sites/2/2022/04/private-bathroom.png"></a>

                                                                                <a href="{{ route('route_FrontEnd_Room_RoomDetail', $room->id) }}"
                                                                                    class="nd_booking_margin_top_7 nd_booking_margin_top_20_all_iphone nd_booking_width_100_percentage_all_iphone nd_booking_float_right nd_booking_float_left_all_iphone nd_booking_display_inline_block nd_booking_text_align_center nd_booking_box_sizing_border_box nd_booking_font_size_12">
                                                                                    <span
                                                                                        class="nd_booking_float_left nd_booking_font_size_11 nd_booking_letter_spacing_2">Thông
                                                                                        Tin Phòng</span>
                                                                                    <img alt=""
                                                                                        class="nd_booking_margin_left_5 nd_booking_float_left"
                                                                                        width="10"
                                                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/inc/shortcodes/include/search-results/icon-right-arrow-grey.svg">
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            @endif
                                                            {{--                                                                            @endif --}}
                                                        @endforeach
                                                    @endforeach
                                                </div>


                                                <script type="text/javascript">
                                                    //<![CDATA[

                                                    jQuery(document).ready(function() {

                                                        //START masonry
                                                        jQuery(function($) {

                                                            //Masonry
                                                            var $nd_booking_masonry_content = $(".nd_booking_masonry_content").imagesLoaded(function() {
                                                                // init Masonry after all images have loaded
                                                                $nd_booking_masonry_content.masonry({
                                                                    itemSelector: ".nd_booking_masonry_item"
                                                                });
                                                            });


                                                            //tooltip
                                                            $(".nd_booking_tooltip_jquery").tooltip({
                                                                tooltipClass: "nd_booking_tooltip_jquery_content",
                                                                position: {
                                                                    my: "center top",
                                                                    at: "center-7 top-33",
                                                                }
                                                            });


                                                        });
                                                        //END masonry

                                                    });

                                                    //]]&gt;
                                                </script>
                                                <script type="text/javascript">
                                                    function saveRoom() {
                                                        let dataRoom =
                                                            localStorage.getItem('countRoom_1') + "," + localStorage.getItem('countRoom_2') + "," + localStorage
                                                            .getItem('countRoom_3') + "," + localStorage.getItem('countRoom_4') + "," + localStorage.getItem(
                                                                'countRoom_5') + "," + localStorage.getItem('countRoom_6');
                                                        document.getElementById("postDataRoom").value = dataRoom;
                                                    }
                                                </script>

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
    </section>
@endsection
