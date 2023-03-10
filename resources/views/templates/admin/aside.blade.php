<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="" href="dashboard" aria-expanded="true">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Booking</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BackEnd_Bookings_List') }}">Đơn đặt phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Bookings_Detail') }}">Chi tiết đơn</a></li>
                    <li><a href="{{ route('route_BackEnd_Employees_List') }}">Nhân viên</a></li>
                    <li><a href="{{ route('route_BackEnd_Rooms_List') }}">Phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Categoryrooms_List') }}">Loại phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_properties_List') }}">Thuộc tính phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Users_List') }}">Người dùng</a></li>
                    <li><a href="{{ route('route_BackEnd_Feedback_List') }}">Nhận xét</a></li>
                </ul>

            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Admin</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BackEnd_Admin_List') }}">Danh sách admin</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Bài đăng</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BackEnd_News_Detail') }}">Nội dung</a></li>
                    <li><a href="{{ route('route_BackEnd_News_List') }}">Tất cả bài đăng</a></li>
                    <li><a href="{{ route('route_BackEnd_News_Add') }}">Soạn bài</a>
                    </li>
                    <li><a href="{{ route('route_BackEnd_Schedule_List') }}">Lịch</a></li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Trang</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>12 Zodiac Admin</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> 12 Zodiac</p>
        </div>
    </div>
</div>
