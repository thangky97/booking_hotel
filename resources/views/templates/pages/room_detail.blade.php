@extends('templates.layouts.masterroomdetail')

{{-- @section('title', 'Liên hệ') --}}

@section('content')

<div
                        class="nd_booking_section nd_booking_padding_15 nd_booking_box_sizing_border_box nd_booking_text_align_center_all_iphone">
                        <!--START title and branches-->
                        <h1 id="nd_booking_single_cpt_1_title"
                            class="nd_booking_font_size_40 nd_booking_font_size_30_all_iphone ">{{$room->name}}</h1>
                        <div class="nd_booking_section nd_booking_height_10"></div>
                        <div id="nd_booking_single_cpt_1_subtitle"
                            class="nd_booking_section nd_booking_display_inline_block_all_iphone nd_booking_width_initial_all_iphone nd_booking_float_initial_all_iphone">
                            <p class=" nd_booking_float_left nd_booking_letter_spacing_2"><span
                                    class="nd_booking_margin_right_10 nd_booking_text_transform_uppercase">12 Zodiac</span></p>
                            @for($i=1; $i<=((int)$room->cate_room+2);$i++)
                                <img alt=""
                                     class="nd_booking_margin_right_5 nd_booking_float_left nd_booking_margin_top_5"
                                     width="15"
                                     src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-star-full-grey.svg">
                            @endfor
                        </div>
                        <!--END title and branches-->
                    </div>

                    <div
                        class="nd_booking_float_left nd_booking_width_66_percentage nd_booking_width_100_percentage_responsive ">
                        <div
                            class=" nd_booking_width_100_percentage nd_booking_padding_15 nd_booking_box_sizing_border_box ">


                            <!-- START roomgallery REVOLUTION SLIDER 6.5.7 -->
                            <p class="rs-p-wp-fix"></p>
                            <rs-module-wrap id="rev_slider_5_1_wrapper" data-source="gallery"
                                style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
                                <rs-module id="rev_slider_5_1" style="" data-version="6.5.7">
                                    <rs-slides>
                                        <rs-slide style="position: absolute;" data-key="rs-11" data-title="Slide"
                                            data-thumb="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room1-50x100.jpeg"
                                            data-in="o:0;" data-out="a:false;">
                                            <img src="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                title="room1" width="1110" height="720"
                                                class="rev-slidebg tp-rs-img rs-lazyload"
                                                data-lazyload="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room1.jpeg"
                                                data-bg="p:center bottom;" data-no-retina>

                                        </rs-slide>
                                        <rs-slide style="position: absolute;" data-key="rs-12" data-title="Slide"
                                            data-thumb="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room2-50x100.jpeg"
                                            data-in="o:0;" data-out="a:false;">
                                            <img src="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                title="room2" width="1110" height="720"
                                                class="rev-slidebg tp-rs-img rs-lazyload"
                                                data-lazyload="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room2.jpeg"
                                                data-bg="p:center bottom;" data-no-retina>

                                        </rs-slide>
                                        <rs-slide style="position: absolute;" data-key="rs-13" data-title="Slide"
                                            data-thumb="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room3-50x100.jpeg"
                                            data-in="o:0;" data-out="a:false;">
                                            <img src="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                title="room3" width="1110" height="720"
                                                class="rev-slidebg tp-rs-img rs-lazyload"
                                                data-lazyload="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room3.jpeg"
                                                data-bg="p:center bottom;" data-no-retina>

                                        </rs-slide>
                                        <rs-slide style="position: absolute;" data-key="rs-14" data-title="Slide"
                                            data-thumb="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room4-50x100.jpeg"
                                            data-in="o:0;" data-out="a:false;">
                                            <img src="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                title="room4" width="1110" height="720"
                                                class="rev-slidebg tp-rs-img rs-lazyload"
                                                data-lazyload="//www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room4.jpeg"
                                                data-bg="p:left bottom;" data-no-retina>

                                        </rs-slide>
                                    </rs-slides>
                                    <rs-static-layers>

                                        <rs-layer id="slider-5-slide-5-layer-0" class="rs-layer-static"
                                            data-type="object" data-rsp_ch="on" data-xy="x:50px;y:50px;"
                                            data-text="w:normal;" data-onslides="s:1;" data-frame_999="o:0;st:w;"
                                            style="z-index:5;font-family:'Roboto';">
                                        </rs-layer>

                                        <rs-layer id="slider-5-slide-5-layer-1" class="rs-layer-static"
                                            data-type="shape" data-rsp_ch="on" data-xy="x:c;y:c;"
                                            data-text="w:normal;" data-dim="w:100%;h:100%;" data-onslides="s:1;"
                                            data-frame_999="o:0;st:w;"
                                            style="z-index:6;background:linear-gradient(rgba(28,28,28,0) 0%, rgba(28,28,28,0.3) 77%, rgba(28,28,28,0.4) 100%);">
                                        </rs-layer>

                                    </rs-static-layers>
                                </rs-module>
                                <script type="text/javascript">
                                    setREVStartSize({
                                        c: 'rev_slider_5_1',
                                        rl: [1240, 1024, 778, 480],
                                        el: [396],
                                        gw: [770],
                                        gh: [396],
                                        type: 'carousel',
                                        justify: '',
                                        layout: 'fullwidth',
                                        mh: "0"
                                    });
                                    if (window.RS_MODULES !== undefined && window.RS_MODULES.modules !== undefined && window.RS_MODULES.modules[
                                            "revslider51"] !== undefined) {
                                        window.RS_MODULES.modules["revslider51"].once = false;
                                        window.revapi5 = undefined;
                                        if (window.RS_MODULES.checkMinimal !== undefined) window.RS_MODULES.checkMinimal()
                                    }
                                </script>
                            </rs-module-wrap>
                            <!-- END REVOLUTION SLIDER -->


                            <div id="nd_booking_single_cpt_1_description"
                                class="nd_booking_section nd_booking_height_50"></div>

                            <!--START basic informations-->
                            <div id="nd_booking_single_cpt_1_basic_info" class="nd_booking_section">
                                <div id="nd_booking_single_cpt_1_basic_info_guests"
                                    class="nd_booking_width_25_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_text_align_center">
                                    <img alt="" class="" width="40"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-user-grey.svg">
                                    <div class="nd_booking_section nd_booking_height_5"></div>
                                    <p class="">{{$room->adult}} người</p>
                                </div>
                                <div id="nd_booking_single_cpt_1_basic_info_night"
                                     class="nd_booking_width_25_percentage nd_booking_width_100_percentage_all_iphone nd_booking_margin_top_40_all_iphone nd_booking_float_left nd_booking_text_align_center">
                                    <img alt="" class="" width="40"
                                         src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-bed-grey.svg">
                                    <div class="nd_booking_section nd_booking_height_5"></div>
                                    <p class="">{{$room->bed}} giường</p>
                                </div>
                                <div id="nd_booking_single_cpt_1_basic_info_measure"
                                    class="nd_booking_width_25_percentage nd_booking_width_100_percentage_all_iphone nd_booking_margin_top_40_all_iphone nd_booking_float_left nd_booking_text_align_center">
                                    <img alt="" class="" width="40"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-plan-grey.svg">
                                    <div class="nd_booking_section nd_booking_height_5"></div>
                                    <p class="">50 m2</p>
                                </div>

                                <div id="nd_booking_single_cpt_1_basic_info_night"
                                     class="nd_booking_width_25_percentage nd_booking_width_100_percentage_all_iphone nd_booking_margin_top_40_all_iphone nd_booking_float_left nd_booking_text_align_center">
                                    <img alt="" class="" width="40"
                                         src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-calendar-grey.svg">
                                    <div class="nd_booking_section nd_booking_height_5"></div>
                                    <p class="">{{$room->price}} đ / ngày</p>
                                </div>
                            </div>
                            <!--END basic informations-->

                            <div class="nd_booking_section nd_booking_height_30"></div>
                            <div
                                class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey nd_booking_single_cpt_1_divider">
                            </div>
                            <div class="nd_booking_section nd_booking_height_40"></div>
                            <div>
                                <h3 style="margin-bottom: 20px">Mô tả:</h3>
                                <p>{{$room->description}}</p>
                            </div>
                            <div id="nd_booking_single_cpt_1_services"
                                class="nd_booking_section nd_booking_height_50"></div>
                            <div
                                class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey nd_booking_single_cpt_1_divider">
                            </div>


                            <div id="nd_booking_single_cpt_1_services_content" class="nd_booking_section">
                                <div class="nd_booking_section nd_booking_height_40"></div>
                                <div class="nd_booking_section">
                                    <h2 class="nd_booking_word_wrap_break_word"><span
                                            style="text-transform: capitalize;">Thuộc tính phòng</span></h2>
                                </div>
                                <div class="nd_booking_section nd_booking_height_20"></div>
                                <?php $propertyWork = explode(",",$room->properties_id)?>
                                @foreach($listProperty as $property)
                                    @if(in_array($property->id,$propertyWork))
                                        <div
                                            class="nd_booking_width_33_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_padding_10_0">
                                            <div class="nd_booking_display_table nd_booking_float_left">
                                                <p
                                                    class="  nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_line_height_20">
                                                    {{$property->name}}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div id="nd_booking_single_cpt_1_services_content" class="nd_booking_section">
                                <div class="nd_booking_section nd_booking_height_40"></div>
                                <div class="nd_booking_section">
                                    <h2 class="nd_booking_word_wrap_break_word"><span
                                            style="text-transform: capitalize;">Dịch vụ phòng</span></h2>
                                </div>
                                <div class="nd_booking_section nd_booking_height_20"></div>
                                @foreach($listService as $service)
                                    <div
                                        class="nd_booking_width_33_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_padding_10_0">
                                        <div class="nd_booking_display_table nd_booking_float_left">
                                            <p
                                                class="  nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_line_height_20">
                                                {{$service->name}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--</div>-->

                        <div id="nd_booking_single_cpt_1_title_packages"
                            class="  nd_booking_section nd_booking_padding_0_15 nd_booking_box_sizing_border_box">
                            <div id="nd_booking_single_cpt_1_packages"
                                class="nd_booking_section nd_booking_height_50"></div>
                            <div
                                class="nd_booking_section nd_booking_height_2 nd_booking_bg_grey nd_booking_single_cpt_1_divider">
                            </div>
                            <div class="nd_booking_section nd_booking_height_40"></div>

                            <div class="nd_booking_section">
                                <h2>Around The Hotel</h2>
                            </div>
                            <div class="nd_booking_section nd_booking_height_30"></div>
                        </div>

                        <div id="nd_booking_single_cpt_1_content_packages"
                            class="  nd_booking_section nd_booking_box_sizing_border_box nd_booking_padding_0_5">

                            <div
                                class="nd_booking_width_33_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_0_10">
                                <div
                                    class="nd_booking_section nd_booking_position_relative nd_booking_box_sizing_border_box">
                                    <img alt="" class="nd_booking_section"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/04/vert-4.jpg">
                                    <div
                                        class="nd_booking_bg_greydark_alpha_gradient_5 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                        <div class="nd_booking_position_absolute nd_booking_bottom_20">
                                            <a
                                                href="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/lounge-bar/">
                                                <h4
                                                    class="nd_options_color_white nd_booking_float_left nd_booking_letter_spacing_2">
                                                    Lounge Bar</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="nd_booking_width_33_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_0_10">
                                <div
                                    class="nd_booking_section nd_booking_position_relative nd_booking_box_sizing_border_box">
                                    <img alt="" class="nd_booking_section"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/vert3.jpeg">
                                    <div
                                        class="nd_booking_bg_greydark_alpha_gradient_5 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                        <div class="nd_booking_position_absolute nd_booking_bottom_20">
                                            <a
                                                href="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/restaurant/">
                                                <h4
                                                    class="nd_options_color_white nd_booking_float_left nd_booking_letter_spacing_2">
                                                    Restaurants</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="nd_booking_width_33_percentage nd_booking_width_100_percentage_all_iphone nd_booking_float_left nd_booking_box_sizing_border_box nd_booking_padding_0_10">
                                <div
                                    class="nd_booking_section nd_booking_position_relative nd_booking_box_sizing_border_box">
                                    <img alt="" class="nd_booking_section"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/vert1.jpeg">
                                    <div
                                        class="nd_booking_bg_greydark_alpha_gradient_5 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                        <div class="nd_booking_position_absolute nd_booking_bottom_20">
                                            <a
                                                href="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wellness/">
                                                <h4
                                                    class="nd_options_color_white nd_booking_float_left nd_booking_letter_spacing_2">
                                                    Wellness</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div
                        class="nd_booking_float_left nd_booking_sidebar nd_booking_padding_15 nd_booking_box_sizing_border_box nd_booking_width_33_percentage nd_booking_width_100_percentage_responsive">


                        <!--START FORM-->
                        <form id="nd_booking_single_cpt_1_calendar"
                            action="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/booking-page/"
                            method="POST">
                            <div
                                class="nd_booking_section nd_booking_box_sizing_border_box nd_booking_margin_top_40_responsive nd_booking_margin_bottom_20_responsive">

                                <div
                                    class="nd_booking_section nd_booking_bg_greydark nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_box_sizing_border_box">

                                    <!--check in/out-->
                                    <div id="nd_booking_single_cpt_1_calendar_checkin"
                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">


                                        <div id="nd_booking_open_calendar_from"
                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
                                            <div
                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                <h6
                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                    CHECK-IN</h6>
                                                <div class="nd_booking_section nd_booking_height_15"></div>
                                                <div class="nd_booking_display_inline_flex ">
                                                    <div class="nd_booking_float_left nd_booking_text_align_right">
                                                        <h1 id="nd_booking_date_number_from_front"
                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important">
                                                            29</h1>
                                                    </div>
                                                    <div
                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                        <h6 id="nd_booking_date_month_from_front"
                                                            class="nd_booking_color_yellow_important  nd_booking_margin_top_7 nd_booking_font_size_12">
                                                            Mar</h6>
                                                        <div class="nd_booking_section nd_booking_height_5"></div>
                                                        <img alt="" width="12"
                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-down-arrow-white.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="nd_booking_date_month_from"
                                            class="nd_booking_section nd_booking_margin_top_20">
                                        <input type="hidden" id="nd_booking_date_number_from"
                                            class="nd_booking_section nd_booking_margin_top_20">
                                        <input placeholder="Check In"
                                            class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_all_iphone nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                            type="text" name="nd_booking_archive_form_date_range_from"
                                            id="nd_booking_archive_form_date_range_from" value="" />
                                    </div>
                                    <div id="nd_booking_single_cpt_1_calendar_checkout"
                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_bottom_0 nd_booking_box_sizing_border_box">

                                        <div id="nd_booking_open_calendar_to"
                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center nd_booking_cursor_pointer">
                                            <div
                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                <h6
                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                    CHECK-OUT</h6>
                                                <div class="nd_booking_section nd_booking_height_15"></div>
                                                <div class="nd_booking_display_inline_flex ">
                                                    <div class="nd_booking_float_left nd_booking_text_align_right">
                                                        <h1 id="nd_booking_date_number_to_front"
                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important">
                                                            30</h1>
                                                    </div>
                                                    <div
                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                        <h6 id="nd_booking_date_month_to_front"
                                                            class="nd_booking_color_yellow_important  nd_booking_margin_top_7 nd_booking_font_size_12">
                                                            Mar</h6>
                                                        <div class="nd_booking_section nd_booking_height_5"></div>
                                                        <img alt="" width="12"
                                                            src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-down-arrow-white.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="nd_booking_date_month_to"
                                            class="nd_booking_section nd_booking_margin_top_20">
                                        <input type="hidden" id="nd_booking_date_number_to"
                                            class="nd_booking_section nd_booking_margin_top_20">
                                        <input placeholder="Check Out"
                                            class="nd_booking_section nd_booking_margin_top_30 nd_booking_margin_0_all_iphone nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                            type="text" name="nd_booking_archive_form_date_range_to"
                                            id="nd_booking_archive_form_date_range_to" value="" />

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
                                        //]]>
                                    </script>
                                    <!--check in/out-->


                                    <!--guests-->
                                    <div id="nd_booking_single_cpt_1_calendar_guests"
                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
                                        <div
                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                            <div
                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                <h6
                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                    GUESTS</h6>
                                                <div class="nd_booking_section nd_booking_height_15"></div>
                                                <div class="nd_booking_display_inline_flex ">
                                                    <div class="nd_booking_float_left nd_booking_text_align_right">
                                                        <h1
                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_guests_number">
                                                            1</h1>
                                                    </div>
                                                    <div
                                                        class="nd_booking_float_right nd_booking_text_align_center nd_booking_margin_left_10">
                                                        <div class="nd_booking_section nd_booking_height_7"></div>
                                                        <div class="nd_booking_section">
                                                            <img class="nd_booking_float_right nd_booking_guests_increase nd_booking_cursor_pointer"
                                                                style="transform: rotate(180deg);" alt=""
                                                                width="12"
                                                                src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-down-arrow-white.svg">
                                                        </div>
                                                        <div class="nd_booking_section nd_booking_height_10"></div>
                                                        <div class="nd_booking_section">
                                                            <img class="nd_booking_float_right nd_booking_guests_decrease nd_booking_cursor_pointer"
                                                                alt="" width="12"
                                                                src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/templates/icon-down-arrow-white.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="nd_booking_display_none"
                                            for="nd_booking_archive_form_guests">Guests :</label>
                                        <input placeholder="Guests" class="nd_booking_section nd_booking_display_none"
                                            type="number" name="nd_booking_archive_form_guests"
                                            id="nd_booking_archive_form_guests" min="1" value="1" />
                                    </div>
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        jQuery(document).ready(function() {

                                            jQuery(function($) {

                                                $(".nd_booking_guests_increase").click(function() {
                                                    var value = $(".nd_booking_guests_number").text();

                                                    if (value < 1) {
                                                        value++;
                                                        $(".nd_booking_guests_increase").removeClass(
                                                            "nd_booking_cursor_not_allowed");
                                                        $(".nd_booking_guests_increase").addClass("nd_booking_cursor_pointer");
                                                        $(".nd_booking_guests_number").text(value);
                                                        $("#nd_booking_archive_form_guests").val(value);
                                                    } else {
                                                        $(".nd_booking_guests_increase").removeClass("nd_booking_cursor_pointer");
                                                        $(".nd_booking_guests_increase").addClass("nd_booking_cursor_not_allowed");
                                                    }


                                                });

                                                $(".nd_booking_guests_decrease").click(function() {
                                                    var value = $(".nd_booking_guests_number").text();

                                                    if (value > 1) {
                                                        value--;
                                                        $(".nd_booking_guests_increase").removeClass(
                                                            "nd_booking_cursor_not_allowed");
                                                        $(".nd_booking_guests_increase").addClass("nd_booking_cursor_pointer");
                                                        $(".nd_booking_guests_number").text(value);
                                                        $("#nd_booking_archive_form_guests").val(value);
                                                    }

                                                });

                                            });

                                        });
                                        //]]>
                                    </script>
                                    <!--guests-->

                                    <!--night info-->
                                    <div id="nd_booking_single_cpt_1_calendar_nights"
                                        class="nd_booking_width_50_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
                                        <div
                                            class="nd_booking_section nd_booking_bg_greydark_2 nd_booking_padding_20 nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                            <div
                                                class="nd_booking_section  nd_booking_box_sizing_border_box nd_booking_text_align_center">
                                                <h6
                                                    class="nd_options_color_white nd_options_second_font nd_booking_letter_spacing_2 nd_booking_font_size_12">
                                                    NIGHTS</h6>
                                                <div class="nd_booking_section nd_booking_height_15"></div>
                                                <div class="nd_booking_display_inline_flex ">
                                                    <div class="nd_booking_float_left nd_booking_text_align_right">
                                                        <h1
                                                            class="nd_booking_font_size_50 nd_booking_color_yellow_important nd_booking_nights_number">
                                                            1</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="nd_booking_archive_form_id"
                                            id="nd_booking_archive_form_id" value="5649-5649" />
                                        <input type="hidden" name="nd_booking_form_booking_arrive_advs"
                                            value="1">
                                        <input type="hidden" name="nd_booking_form_booking_arrive_sr"
                                            value="1">
                                    </div>
                                    <!--night info-->


                                    <!--START button-->
                                    <div id="nd_booking_single_cpt_1_calendar_btn"
                                        class="nd_booking_width_100_percentage nd_booking_float_left nd_booking_padding_15 nd_booking_padding_0_all_iphone nd_booking_padding_top_0 nd_booking_box_sizing_border_box">
                                        <div
                                            class="nd_booking_section nd_booking_height_15 nd_booking_display_none_all_iphone">
                                        </div>
                                        <input
                                            class="nd_options_color_white nd_booking_width_100_percentage nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_bg_yellow nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2"
                                            type="submit" value="BOOK NOW">
                                    </div>
                                    <!--END button-->

                                </div>
                            </div>
                        </form>
                        <!--END FORM-->

                        <div class="nd_booking_section nd_booking_height_40"></div>


                        <div id="block-7" class="widget widget_block">
                            <h2>Best Rooms</h2>
                        </div>
                        <div id="block-9" class="widget widget_block">
                            <p>
                            <div class="nd_booking_section">
                                @foreach($listCaterooms as $cateroom)
                                    @if($cateroom->id!=$room->cate_room)
                                        <div id="nd_booking_ss_rooms_5655"
                                            class="nd_booking_ss_rooms nd_booking_width_100_percentage">

                                            <div style="padding:0px 0px 20px 0px;"
                                                class="nd_booking_section nd_booking_box_sizing_border_box">

                                                <div class="nd_booking_section nd_booking_position_relative">

                                                    <img alt=""
                                                        class="nd_booking_position_absolute nd_booking_left_0 nd_booking_top_0"
                                                        width="100"
                                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room3-150x150.jpeg">

                                                    <div
                                                        class="nd_booking_section nd_booking_padding_left_120 nd_booking_min_height_100 nd_booking_box_sizing_border_box">

                                                        <h4>{{$cateroom->name}}</h4>
                                                        <div class="nd_booking_section nd_booking_height_10"></div>
                                                        <div class="nd_booking_section">
                                                            @for($i=1; $i<=((int)$cateroom->id+2);$i++)
                                                            <img alt=""
                                                                 class="nd_booking_margin_right_5 nd_booking_float_left"
                                                                 width="13"
                                                                 src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/plugins/nd-booking/addons/shortcodes/branches/img/icon-star-full-grey.svg">
                                                            @endfor
                                                        </div>
                                                        <div class="nd_booking_section nd_booking_height_10"></div>
                                                        <p class="">Chỉ từ {{$cateroom->price}} đ</p>
                                                        <div class="nd_booking_section">
                                                            <a href="{{ route('route_FrontEnd_Room_RoomDetail', $cateroom->id) }}"
                                                                style="background-color: #6b6978;"
                                                                class="nd_options_color_white nd_booking_padding_5_10 nd_booking_font_size_10 nd_booking_letter_spacing_2 nd_booking_font_weight_bold">Xêm thêm</a>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            </p>
                        </div>
                        <div id="block-19" class="widget widget_block">
                            <p>
                            <div class="nd_booking_section">
                                <div id="nd_booking_ss_rooms_l2_5649"
                                    class="nd_booking_ss_rooms_l2 nd_booking_section nd_booking_position_relative">

                                    <img alt="" class="nd_booking_section"
                                        src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/room1-1024x664.jpeg">

                                    <div
                                        class="nd_booking_bg_greydark_alpha_gradient_3_3 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">

                                        <div class="nd_booking_position_absolute nd_booking_bottom_30">

                                            <a
                                                href="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/rooms/small-room/">
                                                <h4 class="nd_options_color_white nd_booking_letter_spacing_1">{{$room->name}}</h4>
                                            </a>
                                            <div class="nd_booking_section nd_booking_height_10"></div>
                                            <p
                                                class="nd_options_color_white nd_booking_letter_spacing_2 nd_booking_font_weight_bold nd_booking_font_size_12">
                                               Với {{$room->price}} đ</p>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            </p>
                        </div>
                    </div>

@endsection
