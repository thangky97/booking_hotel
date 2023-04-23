<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @if (Auth::check())
                @if (Auth::user()->role === 1)
                    <li><a class="" href="{{ route('route_BackEnd_Dashboard') }}" aria-expanded="true">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Admin_List') }}" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                            <span class="nav-text">Admin</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Users_List') }}" aria-expanded="false">
                            <i class="bi bi-people-fill"></i>
                            <span class="nav-text">Người dùng</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                            <i class="bi bi-shop-window"></i>
                            <span class="nav-text">Phòng</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('route_BackEnd_Rooms_List') }}">Phòng</a></li>
                            <li><a href="{{ route('route_BackEnd_Categoryrooms_List') }}">Loại phòng</a></li>
                            <li><a href="{{ route('route_BackEnd_properties_List') }}">Thuộc tính</a></li>
                            <li><a href="{{ route('route_BackEnd_PropertyRoom_list') }}">Thuộc tính loại phòng</a></li>
                            <li><a href="{{ route('route_BackEnd_Service_List') }}">Dịch vụ</a></li>
                            <!-- <li><a href="{{ route('route_BackEnd_ServiceRoom_list') }}">Dịch vụ phòng</a></li> -->
                        </ul>
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Bookings_List') }}" aria-expanded="false">
                            <i class="bi bi-minecart-loaded"></i>
                            <span class="nav-text">Booking</span>
                        </a>
                        {{-- <ul aria-expanded="false">
                            <li><a href="{{ route('route_BackEnd_Bookings_List') }}">Đơn đặt phòng</a></li>
                        </ul> --}}
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Bill_List') }}" aria-expanded="false">
                        <i class="bi bi-file-zip"></i>
                        <span class="nav-text">Hóa đơn</span>
                    </a>
                </li>
                    <li><a class="" href="{{ route('route_BackEnd_Banner_List') }}" aria-expanded="false">
                            <i class="bi bi-image-fill"></i>
                            <span class="nav-text">Banner</span>
                        </a>
                    </li>

                    <li><a class="has-arrow ai-icon" href="{{ route('route_BackEnd_News_List') }}"
                            aria-expanded="false">
                            <i class="bi bi-newspaper"></i>
                            <span class="nav-text">Tin Tức</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a class="" href="{{ route('route_BackEnd_News_List') }}" aria-expanded="false">
                                    <span class="nav-text">Danh sách tin tức</span>
                                </a>
                            </li>
                            <li><a class="" href="{{ route('route_BackEnd_Category_News_List') }}"
                                    aria-expanded="false">
                                    <span class="nav-text">Danh mục tin tức</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a class="" href="{{ route('route_BackEnd_Contact_List') }}" aria-expanded="false">
                            <i class="bi bi-telephone"></i>
                            <span class="nav-text">Liên hệ</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Voucher_index') }}" aria-expanded="false">
                            <i class="bi bi-gift-fill"></i>
                            <span class="nav-text">Voucher</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('route_BackEnd_Statistical') }}" aria-expanded="false">
                            <i class="bi bi-bar-chart-fill"></i>
                            <span class="nav-text">Thống kê</span>
                        </a>
                    </li>
                    {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">Bài đăng</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('route_BackEnd_Schedule_List') }}">Lịch</a></li>
                        </ul>
                    </li> --}}
                @else
                    <li><a class="" href="{{ route('route_BackEnd_Dashboard') }}" aria-expanded="true">
                            <i class="bi bi-house-door-fill"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                        <i class="bi bi-shop-window"></i>
                        <span class="nav-text">Phòng</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Rooms_List') }}">Phòng</a></li>
                        <li><a href="{{ route('route_BackEnd_Categoryrooms_List') }}">Loại phòng</a></li>
                        <li><a href="{{ route('route_BackEnd_properties_List') }}">Thuộc tính</a></li>
                        <li><a href="{{ route('route_BackEnd_PropertyRoom_list') }}">Thuộc tính loại phòng</a></li>
                        <li><a href="{{ route('route_BackEnd_Service_List') }}">Dịch vụ</a></li>
                        <li><a href="{{ route('route_BackEnd_ServiceRoom_list') }}">Dịch vụ phòng</a></li>
                    </ul>
                </li>
                <li><a class="" href="{{ route('route_BackEnd_Bookings_List') }}" aria-expanded="false">
                        <i class="bi bi-minecart-loaded"></i>
                        <span class="nav-text">Booking</span>
                    </a>
                    {{-- <ul aria-expanded="false">
                        <li><a href="{{ route('route_BackEnd_Bookings_List') }}">Đơn đặt phòng</a></li>
                    </ul> --}}
                </li>
                <li><a class="" href="{{ route('route_BackEnd_Bill_List') }}" aria-expanded="false">
                    <i class="bi bi-file-zip"></i>
                    <span class="nav-text">Hóa đơn</span>
                </a>
            </li>
                <li><a class="" href="{{ route('route_BackEnd_Banner_List') }}" aria-expanded="false">
                        <i class="bi bi-image-fill"></i>
                        <span class="nav-text">Banner</span>
                    </a>
                </li>

                <li><a class="has-arrow ai-icon" href="{{ route('route_BackEnd_News_List') }}"
                        aria-expanded="false">
                        <i class="bi bi-newspaper"></i>
                        <span class="nav-text">Tin Tức</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a class="" href="{{ route('route_BackEnd_News_List') }}" aria-expanded="false">
                                <span class="nav-text">Danh sách tin tức</span>
                            </a>
                        </li>
                        <li><a class="" href="{{ route('route_BackEnd_Category_News_List') }}"
                                aria-expanded="false">
                                <span class="nav-text">Danh mục tin tức</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li><a class="" href="{{ route('route_BackEnd_Contact_List') }}" aria-expanded="false">
                        <i class="bi bi-telephone"></i>
                        <span class="nav-text">Liên hệ</span>
                    </a>
                </li>
                <li><a class="" href="{{ route('route_BackEnd_Voucher_index') }}" aria-expanded="false">
                        <i class="bi bi-gift-fill"></i>
                        <span class="nav-text">Voucher</span>
                    </a>
                </li>
                {{-- <li><a class="" href="{{ route('route_BackEnd_Statistical') }}" aria-expanded="false">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span class="nav-text">Thống kê</span>
                    </a>
                </li> --}}
                @endif
            @endif
        </ul>
        <div class="copyright">
            <p><strong>12 Zodiac Admin</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> 12 Zodiac</p>
        </div>
    </div>
</div>
