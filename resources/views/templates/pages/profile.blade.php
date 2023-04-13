@extends('templates.layouts.masterprofile')



@section('content')
<div class="elementor-section-wrap">
    <section class="elementor-section elementor-top-section elementor-element elementor-element-df26b5c elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="df26b5c" data-element_type="section" data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
        <div class="elementor-background-overlay"></div>
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-20558a88" data-id="20558a88" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-45cdbdb8 elementor-widget elementor-widget-heading" data-id="45cdbdb8" data-element_type="widget" data-widget_type="heading.default">
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
                                Hồ sơ cá nhân
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="elementor-section elementor-top-section elementor-element elementor-element-2bfe03a5 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2bfe03a5" data-element_type="section" data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
        <div class="container">
            <h1 class="mb-5">Cài đặt tài khoản</h1>
            <?php //Hiển thị thông báo thành công
            ?>
            @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
            <?php //Hiển thị thông báo lỗi
            ?>
            @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif

            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">
                            <img src="{{ asset('storage/'.$user_pf->image)}}" alt="" class="rounded profile-img me-4">
                        </div>
                        <h4 class="text-center">{{$user_pf->name}}</h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-user text-center mr-1"></i>
                            Tài khoản
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password-res" role="tab" aria-controls="password-res" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Mật khẩu
                        </a>
                        <a class="nav-link" id="order-tab" data-toggle="pill" href="#order" role="tab" aria-controls="order" aria-selected="false">
                            <i class="fa fa-tv text-center mr-1"></i>
                            Đơn đặt phòng
                        </a>

                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Thông tin cá nhân</h3>
                        <form class="" action="{{route('route_FrontEnd_User_Update_Profile',$user_pf->id )}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" name="name" class="form-control" value="{{$user_pf->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" value="{{$user_pf->address}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$user_pf->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="{{$user_pf->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" name="date" class="form-control" value="{{$user_pf->date}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select name="gender" id="" class="form-control">
                                            <option class="text-success" value="1" <?php if ($user_pf->gender == 1) : ?>selected <?php endif ?>>Nam</option>
                                            <option class="text-danger" value="2" <?php if ($user_pf->gender == 2) : ?>selected <?php endif ?>>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <i class="fa fa-paperclip"></i>
                                        <label class="col-md-6 col-sm-4 control-label">Ảnh cá nhân</label>
                                        <div class="col-md-9 col-sm-8">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <img id="image" src="{{ asset('storage/'.$user_pf->image)}}" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="rounded profile-img me-4" />
                                                    <input type="file" name="image" class="form-control-file ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <i class="fa fa-paperclip"></i>
                                        <label class="col-md-6 col-sm-4 control-label">Ảnh CMND/CCCD</label>
                                        <div class="col-md-9 col-sm-8">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <img id="cccd" src="{{ asset('storage/'.$user_pf->cccd)}}" alt="your image" style="max-width: 200px; height:100px; margin-bottom: 10px;" class="rounded profile-img me-4" />
                                                    <input type="file" name="cccd" class="form-control-file ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>

                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="password-res" role="tabpanel" aria-labelledby="password-tab">
                        <h3 class="mb-4">Đổi mật khẩu</h3>
                        <form class="" action="{{route('route_FrontEnd_User_Update_Password',$user_pf->id )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mật khẩu cũ</label>
                                        <input type="password" name="password" class="form-control" value="@isset($request['password']){{ $request['password'] }}@endisset">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="new_password" class="form-control" value="@isset($request['new_password']){{ $request['new_password'] }}@endisset" id="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" value="@isset($request['new_password']){{ $request['new_password'] }}@endisset" id="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>

                        </form>

                    </div>
                    <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <h3 class="mb-4">Đơn đặt phòng</h3>
                        <div class="table-responsive">
                            <table class="table card-table  display mb-4 dataTablesCard booking-table table-responsive-lg " id="guestTable-all">
                                <thead>
                                    <tr>
                                        <th>Khách Hàng</th>
                                        <th>Ngày Đặt</th>
                                        <th>Ngày Trả</th>
                                        <th>Số Người</th>
                                        <th>Thanh Toán</th>
                                        <th>Thanh Toán(VNPAY)</th>
                                        <th>Xuất Bill</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($history as $bk_history)

                                    <tr>
                                        <td>
                                            <p>
                                                <a class="nav-link" id="bookingid-tab" data-toggle="pill" href="#bookingid" role="tab" aria-controls="security" aria-selected="false">
                                                    {{$user_pf->name}}
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <div style="width: 100px">
                                                <h6>{{$bk_history->checkin_date}}</h6>
                                                <span class="fs-14">08:29 AM</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 100px">
                                                <h6>{{$bk_history->checkout_date}}</h6>
                                                <span class="fs-14">08:29 AM</span>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{$bk_history->people}}</p>
                                        </td>

                                        <td>
                                            <span class="fs-16">
                                                <?= $bk_history->status_pay == 1 ? '<span class="badge light badge-success">Đã thanh toán</span>' : '<span class="badge light badge-danger">Chưa thanh toán</span>' ?>
                                            </span>
                                        </td>
                                        <td>
                                            @if(empty($bk_history->money_paid))
                                            <p style="width: 150px" class="text-primary">Tại quầy</p>
                                            @else
                                            <p style="width: 150px" class="text-danger"><i>{{number_format($bk_history->money_paid)}}đ</i></p>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <i>
                                                <p class="text-danger " style="font-weight: bold;">
                                                    @foreach($bills as $bill_mn)
                                                    @if($bill_mn->booking_id == $bk_history->id)
                                                    {{number_format($bill_mn->total_money)}}đ
                                                    @endif
                                                    @endforeach
                                                </p>
                                            </i>
                                        </td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p>Mọi thắc mắc về đơn đặt phòng , quý khách vui lòng liên hệ lại đường dây nóng <i class="text-primary">0359410281</i> hoặc mail tới địa chỉ <i class="text-primary">hotel.12zodiac@gmail.com </i>để được hỗ trợ !</p>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>
<script>
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu mới không khớp!");
        } else {
            confirm_password.setCustomValidity("");
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
@endsection