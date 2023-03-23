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
                        <a href="{{route('route_BackEnd_properties_Add')}}" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
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
                                            <th class="text-center">Tên Thuộc tính</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $p)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>

                                                <div class="guest-bx">
                                                    <img class="me-3" src="{{asset("storage/".$p->image)}}" alt="">

                                                    <div>
                                                        <span class="text-primary">#000{{$p->id}}</span>
                                                        <h4 class="mb-0 mt-1"><a class="text-black" href="">{{$p->name}}</a></h4>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <div>
                                                    <span class="text-danger d-block">
                                                        @if ($p->status==1)
                                                        <p class="text-success">Hoạt động</p>
                                                        @else
                                                        <p class="text-warning">Bảo trì</p>
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('route_BackEnd_properties_Detail', $p->id)}}"><button class="btn btn-primary">Sửa</button></a>
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
    {{$properties->links()}}
</div>
<index-cs ref="index_cs"></index-cs>
</section>

@endsection