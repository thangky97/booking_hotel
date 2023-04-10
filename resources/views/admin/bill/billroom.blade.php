@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-xxl-8">

                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h2 <?= $booking->status_pay == 1 ? 'class="text-success"' : 'class="text-danger"' ?>>Bill thanh
                                toán phòng ID:#{{ $booking->id }}</h2>
                        </div>
                        <div class="card-header border-0 pb-0">
                            <div class="me-5 mb-sm-0 mb-3">
                                <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng
                                </p>
                                <h4 class="mb-0 card-title">{{ $format = date('d/m/Y', strtotime($booking->checkin_date)) }}
                                    - {{ $format = date('d/m/Y', strtotime($booking->checkout_date)) }}</h4>
                            </div>
                        </div>
                        <hr style="margin-left: 15px; margin-right: 15px">
                        <div class="card-body d-flex pt-0 align-items-center flex-wrap">
                            <div class="d-flex align-items-center me-5 pe-4 mb-xxl-0 mb-2" style="width: 100%">
                                <div>
                                    <h2 class="card-title mb-0">Tổng số phòng sử dụng : {{ $count }} Phòng</h2>
                                </div>
                            </div>


                        </div>
                        <form action="{{ route('route_BackEnd_Bill', $booking->id) }}" method="post">
                            @csrf
                            <div>
                                <table
                                    class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-mg "
                                    id="guestTable-all">
                                    <thead>
                                        <tr>
                                            <th>Tên phòng</th>
                                            <th>Loại phòng</th>
                                            <th>Dịch vụ</th>
                                            <th>Phí dịch vụ</th>
                                            <th class="bg-none">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room_service as $room_sv)
                                            @foreach ($listRooms as $room)
                                                @if ($room_sv->room_id == $room->id)
                                                    @foreach ($listCaterooms as $cateRoom)
                                                        @if ($room->cate_room == $cateRoom->id)
                                                            <tr>
                                                                <td>
                                                                    <div class="guest-bx">
                                                                        <img class="me-3"
                                                                            src="{{ asset('storage/' . $room->images) }}"
                                                                            alt="">
                                                                        <div>
                                                                            <span
                                                                                class="text-primary">#{{ $booking->id }}</span>
                                                                            <h4 class="mb-0 mt-1"><a class="text-black"
                                                                                    href="">{{ $room->name }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="guest-bx  text-black">
                                                                        {{ $cateRoom->name }}
                                                                        <br>
                                                                        ({{ number_format($cateRoom->price) }}đ)
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-primary  guest-bx">
                                                                        <?php $s_r = explode(',', $room_sv->service_id); ?>
                                                                        @foreach ($service as $ser)
                                                                            @foreach ($s_r as $inx => $sr_id)
                                                                                @if ($sr_id == $ser->id)
                                                                                    -
                                                                                    {{ trim($inx > 0 ? ', ' . $ser->name : $ser->name, ',') }}

                                                                                    <?php echo '<br>'; ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach

                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="text-black  guest-bx">
                                                                        <?php
                                                                        $money = 0;
                                                                        $ser_room_id = $room_sv->service_id;
                                                                        $s_r = explode(',', $ser_room_id);
                                                                        ?>
                                                                        @foreach ($service as $ser)
                                                                            @foreach ($s_r as $inx => $sr_id)
                                                                                <?php if ($sr_id == $ser->id) {
                                                                                    $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                                                                }
                                                                                ?>
                                                                            @endforeach
                                                                        @endforeach
                                                                        {{ number_format($money) }}đ
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <span class="text-danger d-block guest-bx">
                                                                            <?php
                                                                            $money = 0;
                                                                            $ser_room_id = $room_sv->service_id;
                                                                            $s_r = explode(',', $ser_room_id);
                                                                            ?>
                                                                            @foreach ($service as $ser)
                                                                                @foreach ($s_r as $inx => $sr_id)
                                                                                    <?php if ($sr_id == $ser->id) {
                                                                                        $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                                                                                    }
                                                                                    ?>
                                                                                @endforeach
                                                                            @endforeach
                                                                            {{ number_format($cateRoom->price * $use_date + $money) }}đ
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="d-sm-flex d-block align-items-center flex-wrap">
                                                    <div class="me-10 mb-sm-0 mb-3">
                                                        <h3 class="mb-2">Tổng</h3>
                                                        <hr style="margin-left: 15px; margin-right: 15px">
                                                        <h3 class="mb-0 card-title" style="color: blue;">
                                                            <b><var>{{ number_format($total_money_room_service) }}đ</var></b>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr style="margin-left: 15px; margin-right: 15px">
                                <br>
                                <div>
                                    @if (Session::get('voucher'))
                                        @foreach (Session::get('voucher') as $voucher)
                                            <input type="hidden" name="voucher" value="{{ $voucher['id'] }}">
                                            <input type="hidden" name="total_add_voucher"
                                                value="{{ $total_money_room_service - $voucher['discount'] }}">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="" style="text-align: center;">

                                    <button type="submit" class="btn btn-info"><span class="me-2"><i
                                                class="flaticon-022-copy"></i></span>Tiếp Tục
                                    </button>
                                    <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                class="fa fa-times"></i></span><a
                                            href="{{ route('route_BackEnd_Bookings_List') }}">Quay Lại</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="card profile-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin/images/profile/10.jpg') }}" alt=""
                                class="rounded profile-img me-4">
                            <div>
                                <h5 class="text-primary">#Khách hàng</h5>
                                <h4 class="mb-0">{{ $user->name }}</h4>
                            </div>
                        </div>
                        <hr>
                        <ul class="user-info-list">
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                <span>{{ $user->phone }}</span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <span class="overflow-hidden">{{ $user->email }}</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $user->address }}</span>
                            </li>
                        </ul>
                        <hr>
                        <h4 class="me-auto mb-3 text-center">Nhập mã giảm giá </h4>
                        <ul class="user-info-list">


                            @if (Session::get('voucher'))
                                @foreach (Session::get('voucher') as $voucher)
                                    <li>
                                        <div style="color: black;" class="mb-0 card-title">Mã đã sử dụng:<p><b
                                                    style="color: red;"><input type="hidden" name="voucher"
                                                        value="{{ $voucher['id'] }}">{{ $voucher['code'] }}</b>
                                            <p>
                                        </div>
                                        <a href="{{ route('route_BackEnd_Voucher_unset') }}" style="font-size: 15px">
                                            <i class="fa fa-trash" style="font-size: 15px;"></i>
                                        </a>
                                    </li>
                                    <div style="color: black;" class="mb-0 ">Tổng tiền:<b><var>
                                                {{ number_format($total_money_room_service) }}đ</var></b></div>
                                    <div style="color: black;" class="mb-0 ">Tiền giảm :<b><var>
                                                {{ number_format($voucher['discount']) }}đ</var></b></div>
                                    <div style="color: black;" class="mb-0 ">Tổng tiền sau giảm :<b><var> <input
                                                    type="hidden" name="total_add_voucher"
                                                    value="{{ $total_money_room_service - $voucher['discount'] }}">{{ number_format($total_money_room_service - $voucher['discount']) }}đ</var></b>
                                    </div>
                                @endforeach
                            @endif


                            @if (!isset($voucher))
                                <li>
                                    <form action="{{ route('route_BackEnd_Voucher_check') }}" method="post"
                                        class="needs-validation">
                                        @csrf
                                        <div class="mb-3">
                                            <div style="color: black;" class="mb-0 card-title">Mã Voucher</div>
                                            <input type="text" name="voucher" class="form-control bg-transparent"
                                                placeholder="Nhập mã code">
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-info"><span class="me-2"></span>Sử
                                                dụng
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            @endif

                        </ul>

                        @if (Session::has('success'))
                            <div class="alert alert-success solid alert-dismissible fade show">
                                <span><i class="mdi mdi-check"></i></span>
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show"
                                role="alert">
                                <span><i class="mdi mdi-help"></i></span>
                                <strong>{{ Session::get('error') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
