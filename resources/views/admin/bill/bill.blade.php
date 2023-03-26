@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<style>
    .container {
        max-width: 640px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 13px;
    }

    ul.ks-cboxtags {
        list-style: none;
        padding: 20px;
    }

    ul.ks-cboxtags li {
        display: inline;
    }

    ul.ks-cboxtags li label {
        display: inline-block;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid rgba(139, 139, 139, .3);
        color: #adadad;
        border-radius: 25px;
        white-space: nowrap;
        margin: 3px 0px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
    }

    ul.ks-cboxtags li label {
        padding: 8px 12px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 12px;
        padding: 2px 6px 2px 2px;
        content: "\f067";
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked+label::before {
        content: "\f00c";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked+label {
        border: 2px solid #1bdbf8;
        background-color: #12bbd4;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        display: absolute;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
    }

    ul.ks-cboxtags li input[type="checkbox"]:focus+label {
        border: 2px solid #e9a1ff;
    }
</style>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-8">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h2 <?= $booking->status_pay == 1 ? 'class="text-success"' : 'class="text-danger"' ?>>Thanh toán</h2>

                    </div>
                    <div class="card-header border-0 pb-0">
                        <div class="me-5 mb-sm-0 mb-3">
                            <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng</p>
                            <h4 class="mb-0 card-title">{{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h4>
                        </div>
                    </div>
                    <hr style="margin-left: 15px; margin-right: 15px">
                    <div class="card-body d-flex pt-0 align-items-center flex-wrap">
                        <div class="d-flex align-items-center me-5 pe-4 mb-xxl-0 mb-2" style="width: 100%">
                            <div>
                                <h2 class="card-title mb-0">Tổng số phòng sử dụng : {{$count}} Phòng</h2>
                            </div>
                        </div>
                        <!-- checkbox service room  -->

                        <table class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-mg " id="guestTable-all">
                            <thead>
                                <tr>
                                    <th>Thời gian sử dụng</th>
                                    <th>Phí phòng</th>
                                    <th>Phí dịch vụ</th>
                                    <th class="bg-none">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center" style="font-weight: bold;color: #12bbd4;">
                                    <td >
                                        {{$use_date}} Ngày
                                    </td>
                                    <td>
                                        {{$total_money_room}}.00$
                                    </td>
                                    <td>
                                        {{$total_money_service}}.00$
                                    </td>
                                    <td>
                                        {{$total_money_room+$total_money_service}}.00$
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                        <!-- end checkbox -->
                    </div>
                    <hr style="margin-left: 15px; margin-right: 15px">
                    <br>
                    <div class="" style="text-align: center;">
                        <div class="me-10 mb-sm-0 mb-3">
                            <a href="" class="btn btn-info mb-xxl-0 mb-4 btn-submit"><i class="flaticon-022-copy"></i> In hóa đơn</a>
                            <a href="{{route('route_BackEnd_Bookings_List')}}" class="btn btn-danger mb-xxl-0 mb-4 btn-submit"><i class="fa fa-times"></i> Danh sách</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="card profile-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin/images/profile/10.jpg')}}" alt="" class="rounded profile-img me-4">
                            <div>
                                <h5 class="text-primary">#Khách hàng</h5>
                                <h4 class="mb-0">{{$user->name}}</h4>
                            </div>
                        </div>
                        <hr>
                        <ul class="user-info-list">
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                <span>{{$user->phone}}</span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <span class="overflow-hidden">{{$user->email}}</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$user->address}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>