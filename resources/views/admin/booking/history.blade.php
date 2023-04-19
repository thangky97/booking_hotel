@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex align-items-center rooms flex-wrap">
                    <h4 class="me-auto mb-3">Lịch sử đặt phòng khách hàng</h4>
                    <div class="mb-3">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="far fa-file-word me-2"></i>Tạo báo
                            cáo</a>
                    </div>
                </div>
                <div class="row">
                    <div class="card profile-card">
                        <div class="card-body">
                            <div class=" align-items-center">
                                <div style="text-align: center;">

                                    <img src="{{ asset('admin/images/profile/10.jpg') }}" alt="" class="rounded profile-img me-4">
                                    <br>

                                    <h4 class="mb-0">{{ $user->name }}</h4>
                                    <h5 class="text-primary">( Khách hàng )</h5>

                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table card-table  display mb-4 dataTablesCard booking-table table-responsive-lg " id="guestTable-all">
                                    <thead>
                                        <tr>
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                </div>
                                            </th>
                                            <th>Khách Hàng</th>
                                            <th>Ngày Đặt</th>
                                            <th>Ngày Trả</th>
                                            <th>Số Người</th>
                                            <th>Thanh Toán</th>
                                            <th>Hình Thức TT</th>
                                            <th class="bg-none">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $bk_history)
                                        <tr>
                                            <td>
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <p>
                                                    {{ $user->name }}
                                                </p>
                                            </td>
                                            <td>
                                                <div style="width: 100px">
                                                    <h6>{{ $bk_history->checkin_date }}</h6>
                                                    <span class="fs-14">08:29 AM</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 100px">
                                                    <h6>{{ $bk_history->checkout_date }}</h6>
                                                    <span class="fs-14">08:29 AM</span>
                                                </div>
                                            </td>
                                            <td>
                                                <p>{{ $bk_history->people }}</p>
                                            </td>

                                            <td>
                                                <span class="fs-16">
                                                    @if($bk_history->status_booking ==0)
                                                    <span class="badge light badge-warning">Đã Hủy</span>
                                                    @else
                                                    <?= $bk_history->status_pay == 1 ? '<span class="badge light badge-success">Đã thanh toán</span>' : '<span class="badge light badge-warning">Chưa thanh toán</span>' ?>
                                                    @endif </span>
                                            </td>
                                            <td>
                                                @if($bk_history->status_booking ==1)
                                                @if (empty($bk_history->money_paid))
                                                <p style="width: 150px" class="text-primary">Tại quầy</p>
                                                @else
                                                <p style="width: 150px" class="text-danger">
                                                    <i>{{ number_format($bk_history->money_paid) }}đ</i>
                                                </p>
                                                @endif

                                                @else
                                                <p style="width: 150px" class="text-warning">VNPAY(hủy)</p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @if($bk_history->status_booking ==1)
                                                        <a class="dropdown-item" href="{{ route('route_BackEnd_Bookings_Detail', $bk_history->id) }}">Chi
                                                            tiết</a>
                                                        @if (in_array($bk_history->id, $list))
                                                        <a class="dropdown-item" href="{{ route('route_BackEnd_Bill', $bk_history->id) }}">Xem
                                                            Bill</a>
                                                        @else
                                                        <a class="dropdown-item" href="{{ route('route_BackEnd_Bill_Room', $bk_history->id) }}">Tạo
                                                            Bill</a>
                                                        @endif
                                                        @else
                                                        <a class="dropdown-item" href="{{ route('route_BackEnd_Bookings_Detail', $bk_history->id) }}">Chi
                                                            tiết</a>

                                                        @endif

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>