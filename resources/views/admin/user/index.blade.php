@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div style="font-size: 23px; font-weight: 600; color:#000 ; margin-bottom: 20px; margin-left: 2px;">Lọc</div>
                <div class="col-xl-12">
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div style="margin-right: 50px">
                            <form action="{{ route('route_BackEnd_Users_List') }}" method="get">
                                @csrf
                                <input type="search" name="name" value="{{ $name }}" class="form-control"
                                    style="width: 25rem" placeholder="Tìm kiếm">
                            </form>
                        </div>
                        <div style="margin-right: 50px">
                            <form action="{{ route('route_BackEnd_Users_List') }}" method="get">
                                @csrf
                                <input type="search" name="phone" value="{{ $phone }}" class="form-control"
                                    style="width: 25rem" placeholder="Số điện thoại">
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('route_BackEnd_Users_List') }}" method="get">
                                @csrf
                                <input type="search" name="email" value="{{ $email }}" class="form-control"
                                    style="width: 25rem" placeholder="Email">
                            </form>
                        </div>

                </div>
                <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">

                    <div>

                        </div>
                        <div>
                            <a href="{{ route('route_BackEnd_Users_Add') }}" class="btn btn-info mb-xxl-0 mb-4"><i
                                    class="bi bi-people-fill"></i> Thêm mới</a>
                            <a href="{{ route('route_BackEnd_Bookings_Adduser') }}" class="btn btn-primary mb-xxl-0 mb-4"><i
                                    class="far fa-file-word me-2"></i>Đặt phòng</a>
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
                                            <th class="bg-none h5 text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll">
                                                </div>
                                            </th>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Tên</th>
                                            <th class="h5 text-center">Số điện thoại</th>
                                            <th class="h5 text-center">Cmt/Cccd</th>
                                            <th class="h5 text-center">Email</th>
                                            <th class="h5 text-center">Giới tính</th>
                                            <th class="h5 text-center">Ngày sinh</th>
                                            <th class="h5 text-center">Trạng thái</th>
                                            <th class="h5 text-center bg-none">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-primary">#{{ $index + 1 }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="guest-bx">
                                                        <div>
                                                            <h4 class="mb-0 mt-1"><a class="text-black"
                                                                    href="guest-detail.html">{{ $user->name }}</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div>

                                                <span class="fs-16">{{ $user->phone }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <img class="" width="90" src="{{ asset($user->cccd) ? '' . Storage::url($user->cccd) : $user->name }}" alt="">
                                        </td>
                                        <td class="text-center">
                                            <div>

                                                <span class="fs-16">{{ $user->email }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div>

                                                        <span class="fs-16">
                                                            @if ($user && $user->gender === 1)
                                                                Nam
                                                            @else
                                                                Nữ
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <span class="fs-16">{{ $user->date }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <span class="fs-16">
                                                            @if ($user && $user->status === 1)
                                                                <span class="badge light badge-success">Hoạt động</span>
                                                            @elseif ($user && $user->status === 2)
                                                                <span class="badge light badge-warning">Không hoạt
                                                                    động</span>
                                                            @else
                                                                <span class="badge light badge-danger">Khóa</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown dropstart">
                                                        <a href="javascript:void(0);" class="btn-link"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('route_BackEnd_Bookings_Add', ['id' => $user->id]) }}">Đặt
                                                                phòng</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('route_BackEnd_Users_Edit', ['id' => $user->id]) }}">Sửa</a>
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
@endsection