@extends('templates/admin.layoutadmin')
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
                        <a href="{{ route('route_BackEnd_Service_Add') }}" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
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
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @endif
                        <?php //Hiển thị thông báo lỗi
                        ?>
                        @if (Session::has('error'))
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
                                            <th class="bg-none text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                </div>
                                            </th>
                                            <th class="text-center">Tên dịch vụ</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $b)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="guest-bx">
                                                    <img class="me-3" src="{{asset("storage/".$b->images)}}" alt="">
                                                    <div>
                                                        <span class="text-primary">#000{{$b->id}}</span>
                                                        <h4 class="mb-0 mt-1"><a class="text-black" href="">{{$b->name}}</a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <span>{{ number_format($b->price) }}đ</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <span class="text-danger d-block">
                                                        @if ($b->status==1)
                                                        <p class="text-success">Có thể sử dụng</p>
                                                        @elseif($b->status==2)
                                                        <p class="text-danger">Đã sử dụng</p>
                                                        @else
                                                        <p class="text-warning">Đang bảo trì</p>
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('route_BackEnd_Service_Detail', $b->id) }}"><button class="btn btn-primary">Sửa</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$list->links('paginate.index')}} 
                </section>
            </div>
        </div>
    </div>
</div>


@endsection