@extends('templates.layouts.masternews')

@section('title', '12Zodiac - Bài viết')

@section('content')
    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-74f81234 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="74f81234" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2b0c5fd"
                data-id="2b0c5fd" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-25e3addc elementor-widget elementor-widget-heading"
                        data-id="25e3addc" data-element_type="widget" data-widget_type="heading.default">
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
                            <h1 class="elementor-heading-title elementor-size-default">Bài viết</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-59dddd6f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="59dddd6f" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-759d1482"
                data-id="759d1482" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-2106d9f elementor-widget elementor-widget-postgrid"
                        data-id="2106d9f" data-element_type="widget" data-widget_type="postgrid.default">
                        <div class="elementor-widget-container">

                            <div class="nd_elements_section nd_elements_masonry_content nd_elements_posgrid_widget_l4">
                                @foreach ($news as $new)
                                    <div
                                        class=" nd_elements_width_50_percentage nd_elements_width_100_percentage_iphone nd_elements_width_50_percentage_ipad nd_elements_float_left nd_elements_masonry_item nd_elements_padding_15 nd_elements_box_sizing_border_box">

                                        <div
                                            class="nd_elements_section nd_elements_background_color_fff nd_elements_border_1_solid_grey">

                                            <a href="{{ route('route_FrontEnd_New_Detail', ['id' => $new->id]) }}"><img
                                                    class="nd_elements_section" alt=""
                                                    src="{{ $new->images ? '' . Storage::url($new->images) : '' }}"></a>
                                            <div
                                                class="nd_elements_section nd_elements_padding_40 nd_elements_padding_20_iphone nd_elements_box_sizing_border_box">
                                                <div style="display: flex">
                                                    <p style="border-left-color:#444444; padding-right: 15px"
                                                        class="nd_elements_posgrid_widget_l4_date nd_elements_margin_0_important nd_elements_padding_0 nd_elements_letter_spacing_1 nd_elements_font_size_13  nd_elements_line_height_13 nd_elements_padding_left_15 nd_elements_border_left_style_solid nd_elements_border_width_2">
                                                        {{ date('d', strtotime($new->date)) }},
                                                        {{ date('m', strtotime($new->date)) }}, 
                                                        {{ date('Y', strtotime($new->date)) }}
                                                        <p style="letter-spacing: normal; color: #ca2929; font-weight: 500 " class="nd_elements_posgrid_widget_l4_date nd_elements_margin_0_important nd_elements_padding_0 nd_elements_letter_spacing_1 nd_elements_font_size_13  nd_elements_line_height_13 nd_elements_padding_left_15 nd_elements_border_left_style_solid nd_elements_border_width_2">
                                                            @if ($new->cate_new)
                                                                <span>{{ $new->cate_new->name }}</span>
                                                            @else
                                                                <span>Không có danh mục</span>
                                                            @endif
                                                        </p>
                                                    </p>
                                                </div>
                                                <div style="margin-top: 4px; font-size: 13px">
                                                    Người đăng:<span>
                                                        @if ($new->admin_name)
                                                            <span style="color:#8a8faf">{{ $new->admin_name->name }}</span>
                                                        @else
                                                            <span>Không có người đăng</span>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="nd_elements_section nd_elements_height_15">
                                                </div>

                                                <a class="nd_elements_section"
                                                    href="{{ route('route_FrontEnd_New_Detail', ['id' => $new->id]) }}">
                                                    <h3
                                                        class="nd_elements_font_size_23 nd_elements_posgrid_widget_l4_title nd_elements_word_break_break_word nd_elements_font_size_20_iphone nd_elements_line_height_23 nd_elements_margin_0_important nd_elements_letter_spacing_1">
                                                        <strong>{{ $new->name }}</strong>
                                                    </h3>
                                                </a>
                                                <div class="nd_elements_section nd_elements_height_20">
                                                </div>
                                                <p
                                                    class="nd_elements_font_size_15 nd_elements_section nd_elements_margin_0_important nd_elements_posgrid_widget_l4_excerpt nd_elements_line_height_2">
                                                    {{ $new->description }}</p>
                                                <div class="nd_elements_section nd_elements_height_20">
                                                </div>

                                                <a class="nd_options_color_white nd_elements_font_size_13 nd_elements_posgrid_widget_l4_button nd_elements_letter_spacing_1 nd_elements_line_height_1 nd_elements_padding_10_20"
                                                    style="background-color:#444444;"
                                                    href="{{ route('route_FrontEnd_New_Detail', ['id' => $new->id]) }}"><strong>Đọc
                                                        thêm</strong></a>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-64ab0a83"
                data-id="64ab0a83" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-1dea2fcc elementor-widget elementor-widget-heading"
                        data-id="1dea2fcc" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h3 class="elementor-heading-title elementor-size-default">Danh sách ảnh</h3>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-a133a37 gallery-spacing-custom elementor-widget elementor-widget-image-gallery"
                        data-id="a133a37" data-element_type="widget" data-widget_type="image-gallery.default">
                        <div class="elementor-widget-container">
                            <style>
                                /*! elementor - v3.5.6 - 28-02-2022 */
                                .elementor-image-gallery .gallery-item {
                                    display: inline-block;
                                    text-align: center;
                                    vertical-align: top;
                                    width: 100%;
                                    max-width: 100%;
                                    margin: 0 auto
                                }

                                .elementor-image-gallery .gallery-item img {
                                    margin: 0 auto
                                }

                                .elementor-image-gallery .gallery-item .gallery-caption {
                                    margin: 0
                                }

                                .elementor-image-gallery figure img {
                                    display: block
                                }

                                .elementor-image-gallery figure figcaption {
                                    width: 100%
                                }

                                .gallery-spacing-custom .elementor-image-gallery .gallery-icon {
                                    padding: 0
                                }

                                @media (min-width:768px) {
                                    .elementor-image-gallery .gallery-columns-2 .gallery-item {
                                        max-width: 50%
                                    }

                                    .elementor-image-gallery .gallery-columns-3 .gallery-item {
                                        max-width: 33.33%
                                    }

                                    .elementor-image-gallery .gallery-columns-4 .gallery-item {
                                        max-width: 25%
                                    }

                                    .elementor-image-gallery .gallery-columns-5 .gallery-item {
                                        max-width: 20%
                                    }

                                    .elementor-image-gallery .gallery-columns-6 .gallery-item {
                                        max-width: 16.666%
                                    }

                                    .elementor-image-gallery .gallery-columns-7 .gallery-item {
                                        max-width: 14.28%
                                    }

                                    .elementor-image-gallery .gallery-columns-8 .gallery-item {
                                        max-width: 12.5%
                                    }

                                    .elementor-image-gallery .gallery-columns-9 .gallery-item {
                                        max-width: 11.11%
                                    }

                                    .elementor-image-gallery .gallery-columns-10 .gallery-item {
                                        max-width: 10%
                                    }
                                }

                                @media (min-width:480px) and (max-width:767px) {

                                    .elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-10 .gallery-item {
                                        max-width: 50%
                                    }
                                }

                                @media (max-width:479px) {

                                    .elementor-image-gallery .gallery.gallery-columns-2 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-3 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-4 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-5 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-6 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-7 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-8 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-9 .gallery-item,
                                    .elementor-image-gallery .gallery.gallery-columns-10 .gallery-item {
                                        max-width: 100%
                                    }
                                }
                            </style>
                            <div class="elementor-image-gallery">

                                <style type="text/css">
                                    #gallery-1 {
                                        margin: auto;
                                    }

                                    #gallery-1 .gallery-item {
                                        float: left;
                                        margin-top: 10px;
                                        text-align: center;
                                        width: 33%;
                                    }

                                    #gallery-1 img {
                                        border: 2px solid #cfcfcf;
                                    }

                                    #gallery-1 .gallery-caption {
                                        margin-left: 0;
                                    }

                                    /* see gallery_shortcode() in wp-includes/media.php */
                                </style>
                                <div id='gallery-1' class='gallery galleryid-6446 gallery-columns-3 gallery-size-thumbnail'>
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square1"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzA2MSwidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZTEuanBlZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1.jpeg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1-150x150.jpeg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1-150x150.jpeg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1-300x300.jpeg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1-100x100.jpeg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square1.jpeg 540w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl>
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square2"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzA2MiwidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZTIuanBlZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2.jpeg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2-150x150.jpeg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2-150x150.jpeg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2-300x300.jpeg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2-100x100.jpeg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square2.jpeg 540w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl>
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square4"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzA2NCwidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZTQuanBlZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4.jpeg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4-150x150.jpeg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4-150x150.jpeg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4-300x300.jpeg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4-100x100.jpeg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square4.jpeg 540w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl><br style="clear: both" />
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square3"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzA2MywidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZTMuanBlZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3.jpeg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3-150x150.jpeg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3-150x150.jpeg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3-300x300.jpeg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3-100x100.jpeg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square3.jpeg 540w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl>
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square-9"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzE4MiwidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZS05LmpwZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9.jpg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-150x150.jpg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-150x150.jpg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-300x300.jpg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-768x768.jpg 768w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-720x720.jpg 720w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-600x600.jpg 600w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9-100x100.jpg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-9.jpg 800w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl>
                                    <dl class='gallery-item'>
                                        <dt class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="yes"
                                                data-elementor-lightbox-slideshow="a133a37"
                                                data-elementor-lightbox-title="square-5"
                                                e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NzE4MywidXJsIjoiaHR0cDpcL1wvd3d3Lm5pY2Rhcmt0aGVtZXMuY29tXC90aGVtZXNcL2hvdGVsLWJvb2tpbmdcL3dwXC9kZW1vXC9hcGFydG1lbnRzXC93cC1jb250ZW50XC91cGxvYWRzXC9zaXRlc1wvNFwvMjAyMlwvMDVcL3NxdWFyZS01LmpwZyIsInNsaWRlc2hvdyI6ImExMzNhMzcifQ%3D%3D"
                                                href='http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5.jpg'><img
                                                    width="150" height="150"
                                                    src="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-150x150.jpg"
                                                    class="attachment-thumbnail size-thumbnail" alt=""
                                                    loading="lazy"
                                                    srcset="http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-150x150.jpg 150w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-300x300.jpg 300w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-768x768.jpg 768w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-720x720.jpg 720w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-600x600.jpg 600w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5-100x100.jpg 100w, http://www.nicdarkthemes.com/themes/hotel-booking/wp/demo/apartments/wp-content/uploads/sites/4/2022/05/square-5.jpg 800w"
                                                    sizes="(max-width: 150px) 100vw, 150px" /></a>
                                        </dt>
                                    </dl><br style="clear: both" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-e76e9e8 elementor-widget elementor-widget-heading"
                        data-id="e76e9e8" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h3 class="elementor-heading-title elementor-size-default">Dịch vụ</h3>
                        </div>
                    </div>
                    @foreach ($services as $service)
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-e5267ee elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="e5267ee" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-79b96c12"
                                    data-id="79b96c12" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-2c2e96e4 elementor-widget elementor-widget-image"
                                            data-id="2c2e96e4" data-element_type="widget"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <a href="#">
                                                    <img width="800" height="800"
                                                        src="{{ $service->images ? '' . Storage::url($service->images) : '' }}"
                                                        class="attachment-large size-large" alt="" loading="lazy"
                                                        sizes="(max-width: 800px) 100vw, 800px" /> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5b4e72f2"
                                    data-id="5b4e72f2" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-fcb2252 elementor-widget elementor-widget-heading"
                                            data-id="fcb2252" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h3 class="elementor-heading-title elementor-size-default">
                                                    {{ $service->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="elementor-element elementor-element-43a16d9b elementor-align-left elementor-tablet-align-left elementor-widget elementor-widget-button"
                                            data-id="43a16d9b" data-element_type="widget"
                                            data-widget_type="button.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                    <a href="{{ route('route_FrontEnd_Service') }}"
                                                        class="elementor-button-link elementor-button elementor-size-sm elementor-animation-shrink"
                                                        role="button">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Xem thêm</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
