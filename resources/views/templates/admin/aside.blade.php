<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="" href="{{ route('route_BackEnd_Dashboard') }}" aria-expanded="true">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="" href="{{ route('route_BackEnd_Admin_List') }}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Admin</span>
                </a>
            </li>
            <li><a class="" href="{{ route('route_BackEnd_Users_List') }}" aria-expanded="false">
                    <i class="fa fa-users me-2"></i>
                    <span class="nav-text">Người dùng</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Phòng</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BackEnd_Rooms_List') }}">Phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Categoryrooms_List') }}">Loại phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_properties_List') }}">Thuộc tính</a></li>
                    <li><a href="{{ route('route_BackEnd_PropertyRoom_list') }}">Thuộc tính phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Service_List')  }}">Dịch vụ</a></li>
                    <li><a href="{{ route('route_BackEnd_ServiceRoom_list') }}">Dịch vụ phòng</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="#" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Booking</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BackEnd_Bookings_List') }}">Đơn đặt phòng</a></li>
                    <li><a href="{{ route('route_BackEnd_Employees_List') }}">Nhân viên</a></li>
                    <li><a href="{{ route('route_BackEnd_Feedback_List') }}">Nhận xét</a></li>
                </ul>
            </li>
            <li><a class="" href="{{ route('route_BackEnd_Banner_List') }}" aria-expanded="false">
                    <i class="fa fa-users me-2"></i>
                    <span class="nav-text">Banner</span>
                </a>
            </li>
            <li><a class="" href="{{ route('route_BackEnd_Category_News_List') }}" aria-expanded="false">
                <i class="bi bi-newspaper"></i>
                <span class="nav-text">Danh Mục Tin Tức</span>
            </a>
            <li><a class="" href="{{ route('route_BackEnd_News_List') }}" aria-expanded="false">
                <i class="bi bi-newspaper"></i>
                <span class="nav-text">Tin Tức</span>
            </a>
            <li><a class="" href="{{ route('route_BackEnd_Contact_List') }}" aria-expanded="false">
                <i class="bi bi-telephone"></i>
                <span class="nav-text">Liên hệ</span>
            </a>
        </li>
            <li><a class="" href="{{ route('route_BackEnd_Voucher_index') }}" aria-expanded="false">
                    <i class="fa fa-users me-2"></i>
                    <span class="nav-text">Voucher</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Bài đăng</span>
                </a>
                <ul aria-expanded="false">
                    {{--  <li><a href="{{ route('route_BackEnd_News_Detail') }}">Nội dung</a></li>  --}}
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
