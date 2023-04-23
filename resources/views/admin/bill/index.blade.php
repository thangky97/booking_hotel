@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                <div style="font-size: 23px; font-weight: 600; color:#000 ; margin-bottom: 20px; margin-left: 2px;">Lọc
                        </div>
                    <div class="d-flex mb-4 align-items-center flex-wrap">
                        <div style="margin-right: 50px">
                            <caption>
                                <form action="{{ route('route_BackEnd_Bill_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="id" value="" class="form-control"
                                        style="width: 25rem" placeholder="Id hóa đơn">
                                </form>
                            </caption>
                        </div>
                        <div style="margin-right: 50px">
                            <caption>
                                <form action="{{ route('route_BackEnd_Bill_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="booking_id" value="" class="form-control"
                                        style="width: 25rem" placeholder="Id đặt phòng">
                                </form>
                            </caption>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table
                                    class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                                    id="guestTable-all">
                                    <thead>
                                        <tr>
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll">
                                                </div>
                                            </th>
                                            <th>ID hóa đơn</th>
                                            <th>ID đặt phòng</th>
                                            <th>Tổng tiền</th>
                                            <th>Mã voucher</th>
                                            <th>Trạng thái</th>
                                            <th class="bg-none">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $bill)
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fs-16">#{{ $bill->id }}</span>
                                                </td>
                                                <td>
                                                    <span class="fs-16">#{{ $bill->booking_id }}</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ number_format($bill->total_money) }}đ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @if ($bill->voucher)
                                                            <span class="fs-16">{{ $bill->voucher->code }}</span>
                                                        @else
                                                            <span class="fs-16 text-warning">Không có voucher</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-danger d-block">
                                                            @if ($bill->status == 1)
                                                                <p class="text-success">Đã thanh toán</p>
                                                            @else
                                                                <p class="text-warning">Lỗi</p>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('route_BackEnd_Bill_Detail', ['id' => $bill->id]) }}"
                                                        style="margin-left: 10px"><button class="btn btn-primary">Chi
                                                            tiết</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$bills->links('paginate.index')}} 
                </div>
            </div>
        </div>
    </div>

@endsection
