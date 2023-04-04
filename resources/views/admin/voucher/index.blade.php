@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">

                        <div class="table-search">
                            <div class="input-group search-area mb-xxl-0 mb-4">
                                <input type="text" class="form-control" placeholder="Tìm kiếm">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('route_BackEnd_Voucher_add')}}" class="btn btn-info mb-xxl-0 mb-4"><i class="bi bi-gift-fill"></i> Thêm mới</a>
                            <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                        </div>

                    </div>


                    {{-- thong bao  --}}
                    <section class="content booking Hotel">
                        <div id="msg-box">
                            <?php //Hiển thị thông báo thành công
                            ?>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            <?php //Hiển thị thông báo lỗi
                            ?>
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ Session::get('errors') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"></span>
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
                        </div>
                        {{-- @if (count($list) <= 0)
                                <p class="alert alert-warning">
                                    Không có dữ liệu phù hợp
                                </p>
                            @endif --}}

                        {{-- end thong bao  --}}

                        <div class="tab-content">
                            <div class="tab-pane active show" id="All">
                                <div class="table-responsive">
                                    <table class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg " id="guestTable-all">
                                        <thead>
                                        <tr>
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                </div>
                                            </th>
                                            <th class="text-center">Tên </th>
                                            <th class="text-center">Code </th>
                                            <th class="text-center">Giảm giá</th>
                                            <th class="text-center">Số lượng </th>
                                            <th class="text-center">Ngày bắt đầu</th>
                                            <th class="text-center">Ngày ket thuc</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($voucher as $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="guest-bx">

                                                        <div>

                                                            <h4 class="mb-0 mt-1"><a class="text-black" href="">{{ $item->name }}</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="guest-bx">

                                                        <div>

                                                            <h4 class="mb-0 mt-1"><a class="text-black" href="">{{ $item->code }}</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">

                                                        <span>{{ $item->discount }} Đ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">

                                                        <span>{{ $item->limit }} lượt</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">

                                                        <span>{{ $item->date_start   }} </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">

                                                        <span>{{ $item->date_end < $now ? 'Da het han' : $item->date_end }} </span>
                                                    </div>
                                                </td>

                                                {{--                                                <td class="text-center">{{ $item->status == 1 ? 'kích hoạt' : 'khóa' }}</td>--}}


                                                <td>
                                                    <a href="{{route('route_BackEnd_Categoryrooms_Detail', $item->id)}}" style="margin-left: 10px"><button class="btn btn-primary">Sửa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>





    <br>
    <div class="text-center">
        {{$voucher->links()}}
    </div>
    <index-cs ref="index_cs"></index-cs>
    </section>

@endsection