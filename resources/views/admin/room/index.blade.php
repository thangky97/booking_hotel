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
                    {{-- <div class="d-flex mb-4 flex-wrap">
                        
                    </div> --}}
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div style="margin-right: 50px">
                            <caption>
                                <form action="{{ route('route_BackEnd_Rooms_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="name" value="" class="form-control"
                                        style="width: 25rem" placeholder="Tên phòng">
                                </form>
                            </caption>
                        </div>
                        <div>
                            <a href="{{ route('route_BackEnd_Rooms_Add') }}" class="btn btn-info mb-xxl-0 mb-4"
                                style="margin-right: 30px"><i class="fa fa-bed me-2"></i>Thêm mới</a>
                        </div>
                    </div>
					<div id="msg-box">
                        <?php //Hiển thị thông báo thành công
                        ?>
                        @if (Session::has('success'))
                            <div class="alert alert-success solid alert-dismissible fade show">
                                <span><i class="mdi mdi-check"></i></span>
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
                        <?php //Hiển thị thông báo lỗi
                        ?>
                        @if (Session::has('error'))
                            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                <span><i class="mdi mdi-help"></i></span>
                                <strong>{{ Session::get('errors') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
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
                                            <th>Tên phòng</th>
                                            <th>Loại phòng</th>
                                            <th>Tầng</th>
                                            <th>Người lớn</th>
                                            <th>Trẻ em</th>
                                            <th>Giường</th>
                                            <th>Trạng thái</th>
                                            <th class="bg-none">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $a)
                                            <tr>
                                                <td>
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="guest-bx">
                                                        <img class="me-3" src="{{ asset('storage/' . $a->images) }}"
                                                            alt="">
                                                        <div>
                                                            <span class="text-primary">#000{{ $a->id }}</span>
                                                            <h4 class="mb-0 mt-1"><a class="text-black"
                                                                    href="">{{ $a->name }}</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @foreach ($loai_phong as $lp)
                                                        @if ($a->cate_room == $lp->id)
                                                            <p class="text-black">{{ $lp->name }}</p>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">
                                                            @if ($a->floor == 1)
                                                                <p class="text-primary">Tầng 1</p>
                                                            @elseif($a->floor == 2)
                                                                <p class="text-primary">Tầng 2</p>
                                                            @elseif($a->floor == 3)
                                                                <p class="text-primary">Tầng 3</p>
                                                            @elseif($a->floor == 4)
                                                                <p class="text-primary">Tầng 4</p>
                                                            @elseif($a->floor == 5)
                                                                <p class="text-primary">Tầng 5</p>
                                                            @elseif($a->floor == 6)
                                                                <p class="text-primary">Tầng 6</p>
                                                            @elseif($a->floor == 7)
                                                                <p class="text-primary">Tầng 7</p>
                                                            @elseif($a->floor == 8)
                                                                <p class="text-primary">Tầng 8</p>
                                                            @elseif($a->floor == 9)
                                                                <p class="text-primary">Tầng 9</p>
                                                            @elseif($a->floor == 10)
                                                                <p class="text-primary">Tầng 10</p>
                                                            @elseif($a->floor == 11)
                                                                <p class="text-primary">Tầng 11</p>
                                                            @elseif($a->floor == 12)
                                                                <p class="text-primary">Tầng 12</p>
                                                            @elseif($a->floor == 13)
                                                                <p class="text-primary">Tầng 13</p>
                                                            @else
                                                                <p class="text-primary">Tầng 14</p>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ $a->adult }} Người</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ $a->childrend }} Người</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="fs-16">{{ $a->bed }} Giường</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="text-danger d-block">
                                                            @if ($a->status == 1)
                                                                <p class="text-success">Có thể sử dụng</p>
                                                            @elseif($a->status == 2)
                                                                <p class="text-danger">Đã sử dụng</p>
                                                            @else
                                                                <p class="text-warning">Đang bảo trì</p>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('route_BackEnd_Rooms_Detail', $a->id) }}"
                                                        style="margin-left: 10px"><button
                                                            class="btn btn-primary">Sửa</button></a>
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
