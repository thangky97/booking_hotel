@extends('templates.layouts.masterhome')

@section('title', 'Danh sách loại phòng - Hotel 12Zodiac')

@section('content')


    <div id="nd_booking_single_cpt_4_all_rooms" class="nd_booking_width_100_percentage nd_booking_float_left">
        <div class="nd_booking_section nd_booking_height_50"></div>
        <h1 id="nd_booking_single_cpt_4_all_rooms_title"
            class="nd_booking_text_align_center nd_booking_color_greydark nd_booking_font_size_55 nd_booking_font_size_40_all_iphone nd_booking_line_height_40_important_all_iphone nd_options_first_font nd_booking_word_wrap_break_word">
            <span style="text-transform: capitalize">Danh sách loại phòng</span>
        </h1>
        <div class="nd_booking_section nd_booking_height_30"></div>

        <script type="text/javascript">
            //<![CDATA[

            jQuery(document).ready(function() {
                //START masonry
                jQuery(function($) {
                    //Masonry
                    var $nd_booking_masonry_content = $(
                        ".nd_booking_masonry_content"
                    ).imagesLoaded(function() {
                        // init Masonry after all images have loaded
                        $nd_booking_masonry_content.masonry({
                            itemSelector: ".nd_booking_masonry_item",
                        });
                    });
                });
                //END masonry
            });

            //]]>
        </script>

        <div class="nd_booking_section nd_booking_masonry_content">
            @foreach($listCaterooms as $cateroom)
            <div id="nd_booking_archive_cpt_1_single_5654"
                class="nd_booking_rooms_component_l1 nd_booking_masonry_item nd_booking_width_33_percentage nd_booking_float_left nd_booking_width_100_percentage_responsive">
                <div class="nd_booking_section nd_booking_padding_15 nd_booking_box_sizing_border_box">
                    <div class="nd_booking_section nd_booking_border_1_solid_grey nd_booking_bg_white">
                        <div class="nd_booking_section nd_booking_position_relative">
                            <img alt="" class="nd_booking_section" style="height: 200px;"
                                src="{{asset("image/".$cateroom->image)}}" />

                            <div
                                class="nd_booking_bg_greydark_alpha_gradient_3 nd_booking_position_absolute nd_booking_left_0 nd_booking_height_100_percentage nd_booking_width_100_percentage nd_booking_padding_30 nd_booking_box_sizing_border_box">
                                <div class="nd_booking_position_absolute nd_booking_bottom_20">
                                    <p
                                        class="nd_options_color_white nd_booking_margin_right_10 nd_booking_float_left nd_booking_font_size_11 nd_booking_letter_spacing_2 nd_booking_text_transform_uppercase">
                                        12 Zodiac
                                    </p>
                                    @for($i=1; $i<=((int)$cateroom->id+2);$i++)
                                    <img alt="" class="nd_booking_margin_right_5 nd_booking_float_left"
                                        width="10"
                                        src="../../wp-content/plugins/nd-booking/addons/visual/rooms/layout/icon-star-full-white.svg" />
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="nd_booking_section nd_booking_padding_30 nd_booking_box_sizing_border_box">
                            <h1>{{$cateroom->name}}</h1>
                            <div class="nd_booking_section nd_booking_height_10"></div>

                            <div class="nd_booking_section">
                                <div class="nd_booking_display_table nd_booking_float_left">
                                    <img alt=""
                                        class="nd_booking_margin_right_10 nd_booking_display_table_cell nd_booking_vertical_align_middle"
                                        width="23"
                                        src="../../wp-content/plugins/nd-booking/addons/visual/rooms/layout/icon-user-grey.svg" />
                                    <p
                                        class="nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_font_size_12 nd_booking_line_height_26">
                                        @if($cateroom->id ==1)
                                            {{'1 người'}}
                                        @elseif($cateroom->id ==2)
                                            {{'2 người'}}
                                        @elseif($cateroom->id ==3)
                                            {{'4 người'}}
                                        @elseif($cateroom->id ==4)
                                            {{'3 người'}}
                                        @endif
                                    </p>
                                    <img alt=""
                                        class="nd_booking_margin_right_10 nd_booking_margin_left_20 nd_booking_display_table_cell nd_booking_vertical_align_middle"
                                        width="20" 
                                        src="../../wp-content/plugins/nd-booking/addons/visual/rooms/layout/icon-plan-grey.svg" />
                                    <p
                                        class="nd_booking_display_table_cell nd_booking_vertical_align_middle nd_booking_font_size_12 nd_booking_line_height_26">
                                        @if($cateroom->id ==1)
                                            {{'50 m2'}}
                                        @elseif($cateroom->id ==2)
                                            {{'70 m2'}}
                                        @elseif($cateroom->id ==4)
                                            {{'100 m2'}}
                                        @elseif($cateroom->id ==3)
                                            {{'150 m2'}}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="nd_booking_section nd_booking_height_20"></div>
                            <div>

                                <p style="width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 25px;
    -webkit-line-clamp: 3;
    height: 75px;
    display: -webkit-box;
    -webkit-box-orient: vertical;">
                                    {{$cateroom->description}}
                                </p>
                            </div>
                            <div class="nd_booking_section nd_booking_height_20"></div>
                            <a style="border: 2px solid #444444; color: #444444"
                                href="{{ route('route_FrontEnd_Room_RoomDetail', $cateroom->id) }}"
                                class="nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2">XEM CHI TIẾT</a>

                            <div class="nd_booking_section nd_booking_height_20"></div>
                            <div class="nd_booking_section nd_booking_height_1 nd_booking_border_bottom_1_solid_grey"></div>
                            <div class="nd_booking_section nd_booking_height_20"></div>
                            <a title="Bike Rental" class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                    alt="Bike Rental" class="nd_booking_margin_right_15 nd_booking_float_left"
                                    width="23" height="23"
                                    src="../../../hotel/wp-content/uploads/sites/2/2022/04/bike-rental.png" /></a>

                            <a title="Welcome Drink" class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                    alt="Welcome Drink" class="nd_booking_margin_right_15 nd_booking_float_left"
                                    width="23" height="23"
                                    src="../../../hotel/wp-content/uploads/sites/2/2022/04/welcome-drink.png" /></a>

                            <a title="King Beds" class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                    alt="King Beds" class="nd_booking_margin_right_15 nd_booking_float_left"
                                    width="23" height="23"
                                    src="../../../hotel/wp-content/uploads/sites/2/2022/04/king-beds.png" /></a>

                            <a title="Swimming Pool" class="nd_booking_tooltip_jquery nd_booking_float_left"><img
                                    alt="Swimming Pool" class="nd_booking_margin_right_15 nd_booking_float_left"
                                    width="23" height="23"
                                    src="../../../hotel/wp-content/uploads/sites/2/2022/04/swmming-pool.png" /></a>

                            <a href="{{ route('route_FrontEnd_Room_RoomDetail', $cateroom->id) }}"
                                class="nd_booking_margin_top_7 nd_booking_float_right nd_booking_display_inline_block nd_booking_text_align_center nd_booking_box_sizing_border_box nd_booking_font_size_12">
                                <span
                                    class="nd_booking_float_left nd_booking_font_size_11 nd_booking_letter_spacing_2">Xem thêm</span>
                                <img alt="" class="nd_booking_margin_left_5 nd_booking_float_left" width="10"
                                    src="../../wp-content/plugins/nd-booking/addons/visual/rooms/layout/icon-right-arrow-grey.svg" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
