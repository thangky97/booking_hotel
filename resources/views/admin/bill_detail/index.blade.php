@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
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
                                            <th>ID</th>
                                            <th>d</th>
                                            <th>Dịch vụ</th>
                                            <th>Phòng</th>
                                            <th>Hóa đơn</th>
                                            <th>Số ngày</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fs-16">#{{ $bill_detail->id }}</span>
                                            </td>
                                            <td>
                                                @foreach ($listRooms as $lp)
                                                    @if ($bill_detail->room == $lp->room_id)
                                                        <p class="text-black">{{ $lp->name }}</p>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="fs-16">{{ $bill_detail->service_id }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="fs-16">{{ $bill_detail->room_id }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="fs-16">{{ $bill_detail->bill_id }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="fs-16">{{ $bill_detail->date }} ngày</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <span class="text-danger d-block">
                                                        @if ($bill_detail->status == 1)
                                                            <p class="text-success">Đã thanh toán</p>
                                                        @else
                                                            <p class="text-warning">Lỗi</p>
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
