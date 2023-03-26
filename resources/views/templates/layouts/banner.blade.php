<section
    class="elementor-section elementor-top-section elementor-element elementor-element-f7497b1 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="f7497b1" data-element_type="section" style="margin-top: -11px">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4a7add1"
            data-id="4a7add1" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-111f7ce elementor-widget elementor-widget-slider_revolution"
                    data-id="111f7ce" data-element_type="widget" data-widget_type="slider_revolution.default">
                    <div class="elementor-widget-container">

                        <div class="wp-block-themepunch-revslider">
                            <!-- START Home2 REVOLUTION SLIDER 6.5.7 -->
                            <p class="rs-p-wp-fix"></p>
                            <rs-module-wrap id="rev_slider_14_1_wrapper" data-source="gallery"
                                style="visibility:hidden;background:transparent;padding:0;">
                                @foreach ($banners as $banner)
                                    <rs-module id="rev_slider_14_1" style="" data-version="6.5.7">
                                        <rs-slides>

                                            <rs-slide style="position: absolute;" data-key="rs-33" data-title="Slide"
                                                data-thumb="" data-in="o:0;" data-out="a:false;">
                                                <img src="{{ asset('http://127.0.0.1:8000/storage/' . $banner->images) }}"
                                                    title="parallax-20" width="1719" height="720"
                                                    class="rev-slidebg tp-rs-img rs-lazyload" data-parallax="8"
                                                    data-panzoom="d:3000;e:power4.out;ss:250;se:100;" data-no-retina>

                                            </rs-slide>


                                            {{-- <rs-slide style="position: absolute;" data-key="rs-34" data-title="Slide"
                                                data-thumb="" data-in="o:0;" data-out="a:false;">
                                                <img loading="lazy" src="" title="parallax-21"
                                                    width="1920" height="1280"
                                                    class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload=""
                                                    data-parallax="8"
                                                    data-panzoom="d:3000;e:power4.out;ss:250;se:100;" data-no-retina>
                                                <rs-zone id="rrzb_34" class="rev_row_zone_bottom"
                                                    style="z-index: 6;">
                                                    <rs-row id="slider-14-slide-34-layer-9" data-type="row"
                                                        data-xy="xo:100px;y:b;" data-text="l:22;a:inherit;"
                                                        data-rsp_bd="off" data-margin="b:130,100,100,80;"
                                                        data-frame_1="sR:10;"
                                                        data-frame_999="o:0;st:w;sR:8690;sA:9000;" style="z-index:6;">
                                                        <rs-column id="slider-14-slide-34-layer-10" data-type="column"
                                                            data-xy="xo:100px;yo:100px;"
                                                            data-text="l:22;a:inherit,inherit,center,center;"
                                                            data-rsp_bd="off" data-column="w:100%;"
                                                            data-padding="r:50,50,50,20;l:50,50,50,20;"
                                                            data-frame_999="o:0;st:w;sR:8690;sA:9000;"
                                                            style="z-index:7;width:100%;">
                                                            <rs-layer id="slider-14-slide-34-layer-5" data-type="text"
                                                                data-rsp_ch="on"
                                                                data-xy="x:l,l,c,c;xo:0,73px,0,0;y:t,b,b,b;yo:0,230px,270px,250px;"
                                                                data-text="w:normal;s:100,100,70,50;l:90,90,70,50;ls:0,0,-5px,0;a:inherit,inherit,center,center;"
                                                                data-dim="w:auto,auto,480px,360px;"
                                                                data-disp="inline-block"
                                                                data-padding="t:10;r:20;l:13;"
                                                                data-frame_0="x:100%;o:1;"
                                                                data-frame_0_mask="u:t;x:-100%;"
                                                                data-frame_1="e:power4.inOut;st:500;sp:2000;sR:490;"
                                                                data-frame_1_mask="u:t;"
                                                                data-frame_999="x:-100%;o:1;e:power4.inOut;st:w;sp:750;sR:6500;"
                                                                data-frame_999_mask="u:t;x:100%;"
                                                                style="z-index:8;font-family:'Roboto';display:inline-block;">
                                                                SUITES &<br />APARTMENTS
                                                            </rs-layer>
                                                            <rs-layer id="slider-14-slide-34-layer-12"
                                                                class="tp-shape tp-shapewrapper" data-type="shape"
                                                                data-rsp_ch="on" data-text="w:normal;a:inherit;"
                                                                data-dim="w:100%;h:20px,20px,10px,10px;"
                                                                data-frame_999="o:0;st:w;sR:8690;"
                                                                style="z-index:11;background-color:rgba(0,0,0,0);">
                                                            </rs-layer>
                                                            <rs-layer id="slider-14-slide-34-layer-6" data-type="text"
                                                                data-rsp_ch="on"
                                                                data-xy="x:l,l,c,c;xo:0,72px,0,0;y:t,b,b,b;yo:0,190px,230px,210px;"
                                                                data-text="w:normal;s:20,20,14,12;l:20,20,20,22;ls:4px,4px,4px,2px;fw:300;a:inherit,inherit,center,center;"
                                                                data-dim="w:auto,auto,480px,360px;"
                                                                data-disp="inline-block" data-padding="t:5;r:20;l:20;"
                                                                data-frame_0="x:100%;o:1;"
                                                                data-frame_0_mask="u:t;x:-100%;"
                                                                data-frame_1="e:power4.inOut;st:500;sp:2000;sR:490;"
                                                                data-frame_1_mask="u:t;"
                                                                data-frame_999="x:-100%;o:1;e:power4.inOut;st:w;sp:750;sR:6500;"
                                                                data-frame_999_mask="u:t;x:100%;"
                                                                style="z-index:9;font-family:'Roboto';display:inline-block;">
                                                                CHECK OUR LATEST SEASONAL PROMOTIONS
                                                            </rs-layer>
                                                            <rs-layer id="slider-14-slide-34-layer-13"
                                                                class="tp-shape tp-shapewrapper" data-type="shape"
                                                                data-rsp_ch="on" data-text="w:normal;a:inherit;"
                                                                data-dim="w:100%;h:40px,40px,30px,30px;"
                                                                data-frame_999="o:0;st:w;sR:8690;"
                                                                style="z-index:12;background-color:rgba(0,0,0,0);">
                                                            </rs-layer>
                                                            <rs-layer id="slider-14-slide-34-layer-7" class="rev-btn"
                                                                data-type="button" data-rsp_ch="on"
                                                                data-xy="x:l,l,c,l;xo:0,93px,0,0;y:t,b,b,t;yo:0,100px,140px,0;"
                                                                data-text="w:normal,nowrap,nowrap,nowrap;s:11;l:11;ls:2px;fw:900,700,700,700;a:inherit;"
                                                                data-disp="inline-block" data-margin="l:20,20,0,0;"
                                                                data-padding="t:15;r:30,35,35,35;b:15;l:30,35,35,35;"
                                                                data-border="bor:0%,0%,0%,0%;"
                                                                data-frame_0="x:100%;o:1;"
                                                                data-frame_0_mask="u:t;x:-100%;"
                                                                data-frame_1="e:power4.inOut;st:1000;sp:1500;sR:990;"
                                                                data-frame_1_mask="u:t;"
                                                                data-frame_999="x:-100%;o:1;e:power4.inOut;st:w;sp:750;sR:6500;"
                                                                data-frame_999_mask="u:t;x:100%;"
                                                                data-frame_hover="c:#fff;bgc:#1c1c1c;boc:#fff;bor:0px,0px,0px,0px;bow:0px,0px,0px,0px;oX:50;oY:50;e:none;"
                                                                style="z-index:10;background-color:#444444;font-family:'Roboto';cursor:pointer;display:inline-block;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                                                CHECK ALL ROOMS
                                                            </rs-layer>
                                                        </rs-column>
                                                    </rs-row>
                                                </rs-zone>
                                                <rs-layer id="slider-14-slide-34-layer-14" class="rs-svg"
                                                    data-type="svg" data-color="#ffffff||#2d3032||#2d3032||#2d3032"
                                                    data-rsp_ch="on" data-xy="x:r;xo:70px;y:b;yo:70px;"
                                                    data-text="fw:700;a:inherit;" data-dim="w:60px;h:60px;"
                                                    data-vbility="t,t,f,f"
                                                    data-actions='o:click;a:jumptoslide;slide:next;'
                                                    data-svg_src="../wp-content/plugins/revslider/public/assets/assets/svg/navigation/ic_arrow_forward_36px.svg"
                                                    data-svgi="c:#ffffff||#2d3032||#2d3032||#2d3032;"
                                                    data-svgh="c:#2d3032;" data-basealign="slide"
                                                    data-frame_0="x:100%;o:1;" data-frame_0_mask="u:t;x:-100%;"
                                                    data-frame_1="e:power4.inOut;st:1500;sp:2000;sR:1500;"
                                                    data-frame_1_mask="u:t;" data-frame_999="o:0;st:w;sR:5500;"
                                                    data-frame_hover="o:0.5;c:#2d3032;oX:50;oY:50;"
                                                    data-loop_0="x:-10;"
                                                    data-loop_999="x:10;sp:2000;e:power1.inOut;yym:t;yys:t;yyf:t;"
                                                    style="z-index:13;font-family:'Roboto';cursor:pointer;">
                                                </rs-layer>
                                                <rs-layer id="slider-14-slide-34-layer-16"
                                                    class="tp-shape tp-shapewrapper" data-type="shape"
                                                    data-rsp_ch="on" data-xy="x:c;y:m;" data-text="a:inherit;"
                                                    data-dim="w:2500px;h:1200px;" data-frame_1="sR:10;"
                                                    data-frame_999="o:0;st:w;sR:8690;"
                                                    style="z-index:5;background:linear-gradient(to bottom, rgba(28,28,28,0.2) 0%,rgba(28,28,28,0.7) 100%);">
                                                </rs-layer>
                                            </rs-slide> --}}

                                        </rs-slides>
                                    </rs-module>
                                @endforeach
                                <script type="text/javascript">
                                    setREVStartSize({
                                        c: 'rev_slider_14_1',
                                        rl: [1240, 1024, 778, 480],
                                        el: [800, 768, 960, 720],
                                        gw: [1240, 1024, 778, 480],
                                        gh: [800, 768, 960, 720],
                                        type: 'standard',
                                        justify: '',
                                        layout: 'fullscreen',
                                        offsetContainer: '',
                                        offset: '128px',
                                        mh: "600px"
                                    });
                                    if (window.RS_MODULES !== undefined && window.RS_MODULES.modules !== undefined && window.RS_MODULES.modules[
                                            "revslider141"] !== undefined) {
                                        window.RS_MODULES.modules["revslider141"].once = false;
                                        window.revapi14 = undefined;
                                        if (window.RS_MODULES.checkMinimal !== undefined) window.RS_MODULES.checkMinimal()
                                    }
                                </script>
                            </rs-module-wrap>
                            <!-- END REVOLUTION SLIDER -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section
    class="elementor-section elementor-top-section elementor-element elementor-element-eac757e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
    data-id="eac757e" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6d3b76e"
            data-id="6d3b76e" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-78849d8 elementor-widget elementor-widget-search"
                    data-id="78849d8" data-element_type="widget" data-widget_type="search.default">
                    <div class="elementor-widget-container">

                        <div class=" nd_booking_search_elem_component_l2 nd_booking_section  ">

                            <!--START FORM-->
                            <form action="{{ route('route_FontEnd_BookingSearch_Search') }}" method="post">
                                @csrf
                                <!--START check in-->
                                <div id="nd_booking_open_calendar_from"
                                    class="nd_booking_width_25_percentage nd_booking_padding_10_15 nd_booking_width_100_percentage_all_iphone nd_booking_width_50_all_ipad nd_booking_float_left nd_booking_box_sizing_border_box">

                                    <h6 class="nd_booking_label_search">Ngày đến</h6>
                                    <div class="nd_booking_section nd_booking_height_15"></div>

                                    <div
                                        class="nd_booking_section nd_booking_section_box_search_field nd_booking_border_style_solid nd_booking_padding_10_20 nd_booking_position_relative">
                                        <p id="nd_booking_date_number_from_front"
                                            class="nd_booking_field_search nd_booking_display_inline_block ">
                                            <?php echo date('d'); ?></p>
                                        <p id="nd_booking_date_month_from_front"
                                            class="nd_booking_field_search nd_booking_display_inline_block ">
                                            <?php
                                            if (date('m') == 1) {
                                                echo 'Jan';
                                            } elseif (date('m') == 2) {
                                                echo 'Feb';
                                            } elseif (date('m') == 3) {
                                                echo 'Mar';
                                            } elseif (date('m') == 4) {
                                                echo 'Apr';
                                            } elseif (date('m') == 5) {
                                                echo 'May';
                                            } elseif (date('m') == 6) {
                                                echo 'Jun';
                                            } elseif (date('m') == 7) {
                                                echo 'Jul';
                                            } elseif (date('m') == 8) {
                                                echo 'Aug';
                                            } elseif (date('m') == 9) {
                                                echo 'Sep';
                                            } elseif (date('m') == 10) {
                                                echo 'Oct';
                                            } elseif (date('m') == 11) {
                                                echo 'Nov';
                                            } else {
                                                echo 'Dec';
                                            }
                                            ?></p>
                                        <img class="nd_booking_position_absolute nd_booking_right_20 nd_booking_top_50_percentage nd_booking_margin_top_6_negative"
                                            alt="" width="12"
                                            src="../hotel/wp-content/uploads/sites/2/2022/03/icon-down-arrow-white.png">
                                    </div>

                                    <input type="hidden" id="nd_booking_date_month_from"
                                        class="nd_booking_section nd_booking_margin_top_20">
                                    <input type="hidden" id="nd_booking_date_number_from"
                                        class="nd_booking_section nd_booking_margin_top_20">
                                    <input placeholder="Check In"
                                        class="nd_booking_section nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                        type="text" name="check_in" id="nd_booking_archive_form_date_range_from"
                                        value="" />

                                </div>
                                <!--END check IN-->


                                <!--START check out-->
                                <div id="nd_booking_open_calendar_to"
                                    class="nd_booking_width_25_percentage nd_booking_padding_10_15 nd_booking_width_100_percentage_all_iphone nd_booking_width_50_all_ipad nd_booking_float_left nd_booking_box_sizing_border_box">

                                    <h6 class="nd_booking_label_search">Ngày đi</h6>
                                    <div class="nd_booking_section nd_booking_height_15"></div>

                                    <div
                                        class="nd_booking_section nd_booking_section_box_search_field nd_booking_border_style_solid nd_booking_padding_10_20 nd_booking_position_relative">
                                        <p id="nd_booking_date_number_to_front"
                                            class="nd_booking_field_search nd_booking_display_inline_block ">
                                            <?php echo date('d') + 1; ?></p>
                                        <p id="nd_booking_date_month_to_front"
                                            class="nd_booking_field_search nd_booking_display_inline_block ">
                                            <?php
                                            if (date('m') == 1) {
                                                echo 'Jan';
                                            } elseif (date('m') == 2) {
                                                echo 'Feb';
                                            } elseif (date('m') == 3) {
                                                echo 'Mar';
                                            } elseif (date('m') == 4) {
                                                echo 'Apr';
                                            } elseif (date('m') == 5) {
                                                echo 'May';
                                            } elseif (date('m') == 6) {
                                                echo 'Jun';
                                            } elseif (date('m') == 7) {
                                                echo 'Jul';
                                            } elseif (date('m') == 8) {
                                                echo 'Aug';
                                            } elseif (date('m') == 9) {
                                                echo 'Sep';
                                            } elseif (date('m') == 10) {
                                                echo 'Oct';
                                            } elseif (date('m') == 11) {
                                                echo 'Nov';
                                            } else {
                                                echo 'Dec';
                                            }
                                            ?></p>
                                        <img class="nd_booking_position_absolute nd_booking_right_20 nd_booking_top_50_percentage nd_booking_margin_top_6_negative"
                                            alt="" width="12"
                                            src="../hotel/wp-content/uploads/sites/2/2022/03/icon-down-arrow-white.png">
                                    </div>

                                    <input type="hidden" id="nd_booking_date_month_to"
                                        class="nd_booking_section nd_booking_margin_top_20">
                                    <input type="hidden" id="nd_booking_date_number_to"
                                        class="nd_booking_section nd_booking_margin_top_20">
                                    <input placeholder="Check Out"
                                        class="nd_booking_section nd_booking_border_width_0_important nd_booking_padding_0_important nd_booking_height_0_important"
                                        type="text" name="check_out" id="nd_booking_archive_form_date_range_to"
                                        value="" />

                                </div>
                                <!--END check out-->


                                <!--guests-->
                                <div
                                    class="nd_booking_width_25_percentage nd_booking_padding_10_15 nd_booking_width_100_percentage_all_iphone nd_booking_width_50_all_ipad nd_booking_float_left  nd_booking_box_sizing_border_box">

                                    <h6 class="nd_booking_label_search">Số người</h6>
                                    <div class="nd_booking_section nd_booking_height_15"></div>

                                    <div
                                        class="nd_booking_section nd_booking_section_box_search_field nd_booking_border_style_solid nd_booking_padding_10_20 nd_booking_position_relative">
                                        <p
                                            class="nd_booking_guests_number nd_booking_display_inline_block nd_booking_field_search">
                                            1</p>

                                        <img class="nd_booking_position_absolute nd_booking_right_20 nd_booking_top_50_percentage nd_booking_margin_top_6_negative nd_booking_guests_increase nd_booking_cursor_pointer"
                                            style="transform: rotate(180deg);" alt="" width="12"
                                            src="../hotel/wp-content/uploads/sites/2/2022/03/icon-down-arrow-white.png">
                                        <img class="nd_booking_position_absolute nd_booking_right_42 nd_booking_top_50_percentage nd_booking_margin_top_6_negative nd_booking_guests_decrease nd_booking_cursor_pointer"
                                            alt="" width="12"
                                            src="../hotel/wp-content/uploads/sites/2/2022/03/icon-down-arrow-white.png">

                                    </div>

                                    <input placeholder="Guests" class="nd_booking_section nd_booking_display_none"
                                        type="number" name="people" id="nd_booking_archive_form_guests"
                                        min="1" />

                                </div>
                                <!--guests-->
                                <div style="padding-top: 60px"
                                    class="nd_booking_width_25_percentage nd_booking_padding_10_15 nd_booking_width_100_percentage_all_iphone nd_booking_width_50_all_ipad nd_booking_float_left  nd_booking_box_sizing_border_box">
                                    <button
                                        class="nd_booking_width_100_percentage nd_booking_white_space_normal nd_booking_border_style_solid "
                                        type="submit">TÌM KIẾM
                                    </button>
                                </div>
                            </form>
                            <!--END FORM-->

                        </div>

                        <!--CHECKIN/OUT SCRIPT-->
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
                                        var nd_booking_nights_number = (nd_booking_end - nd_booking_start) / 1000 / 60 / 60 /
                                            24;
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
                        <!--END CHECKIN/OUT SCRIPT-->


                        <!--GUESTS SCRIPT-->
                        <script type="text/javascript">
                            //<![CDATA[
                            jQuery(document).ready(function() {

                                jQuery(function($) {

                                    $(".nd_booking_guests_increase").click(function() {
                                        var value = $(".nd_booking_guests_number").text();
                                        value++;
                                        $(".nd_booking_guests_number").text(value);
                                        $("#nd_booking_archive_form_guests").val(value);
                                    });

                                    $(".nd_booking_guests_decrease").click(function() {
                                        var value = $(".nd_booking_guests_number").text();

                                        if (value > 1) {
                                            value--;
                                            $(".nd_booking_guests_number").text(value);
                                            $("#nd_booking_archive_form_guests").val(value);
                                        }

                                    });

                                });

                            });
                            //]]&gt;
                        </script>
                        <!--END GUESTS SCRIPT-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
