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
                                            <th>Tên</th>
                                            <th>Ngày đến</th>
                                            <th>Ngày đi</th>
                                            <th>Số người</th>
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
                                                {{-- <td>
											@foreach ($loai_phong as $lp)
											@if ($bill->cate_room == $lp->id)
											<p class="text-black">{{$lp->name}}</p>				
											@endif
											@endforeach
										</td> --}}
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ number_format($bill->total_money) }}đ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ $bill->voucher->code }}</span>
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
