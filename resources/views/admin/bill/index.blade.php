@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div class="table-search">
                            <div class="input-group search-area mb-xxl-0 mb-4">
                                <input type="text" class="form-control" placeholder="Tìm kiếm">
                                <span class="input-group-text"><a href="javascript:void(0)"><i
                                            class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('route_BackEnd_Rooms_Add') }}" class="btn btn-info mb-xxl-0 mb-4"><i
                                    class="fa fa-bed me-2"></i>Thêm mới</a>
                            <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
                                    class="far fa-file-word me-2"></i>Tạo báo cáo</a>
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
                                                    <a href="{{ route('route_BackEnd_BillDetail_List', $bill->id) }}"
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
                </div>
            </div>
        </div>
    </div>
