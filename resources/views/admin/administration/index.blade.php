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
                    <div class="d-flex mb-4 flex-wrap">
                        <div style="margin-right: 50px">
                            <caption>
                                <form action="{{ route('route_BackEnd_Admin_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="name" value="{{ $name }}" class="form-control"
                                        style="width: 25rem" placeholder="Tên">
                                </form>
                            </caption>
                            {{-- <span class="input-group-text"><a href="javascript:void(0)"><i
                                        class="flaticon-381-search-2"></i></a></span> --}}
                        </div>
                        <div style="margin-right: 50px">
                            <caption>
                                <form action="{{ route('route_BackEnd_Admin_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="phone" value="{{ $phone }}" class="form-control"
                                        style="width: 25rem" placeholder="Số điện thoại">
                                </form>
                            </caption>
                        </div>

                        <div class="">
                            <caption>
                                <form action="{{ route('route_BackEnd_Admin_List') }}" method="get">
                                    @csrf
                                    <input type="search" name="email" value="{{ $email }}" class="form-control"
                                        style="width: 25rem" placeholder="Email">
                                </form>
                            </caption>
                        </div>
                    </div>
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div></div>

                        <div>
                            <a href="{{ route('route_BackEnd_Admin_Add') }}" class="btn btn-info mb-xxl-0 mb-4" style="margin-right: 30px"><i
                                    class="bi bi-person-fill"></i> Thêm mới</a>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
                                    class="far fa-file-word me-2"></i>Tạo báo cáo</a> --}}
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
                                    class="table card-table  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                                    id="guestTable-all">

                                    <thead>
                                        <tr>
                                            <th class="bg-none h5 text-center">STT
                                            </th>
                                            <th>Tên</th>
                                            <th class="h5 text-center">Email</th>
                                            <th class="h5 text-center">Phone</th>
                                            <th class="h5 text-center">Role</th>
                                            <th class="h5 text-center">Status</th>
                                            <th class="h5 text-center bg-none">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin_list as $index => $admin)
                                            <tr>
                                                <td class="text-center text-primary">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="concierge-bx">
                                                        <img class="me-3 rounded"
                                                            src="{{ asset($admin->avatar) ? '' . Storage::url($admin->avatar) : $admin->name }}"
                                                            alt="">
                                                        <div>

                                                            <h4 class="mt-1 pt-3"><a class="text-black"
                                                                    href="">{{ $admin->name }}</a></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><a
                                                        href="javascript:void(0);"><strong>{{ $admin->email }}</strong></a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="text-nowrap">
                                                        <span class="text-black font-w500"><i
                                                                class="fas fa-phone-volume me-2 text-primary"></i>{{ $admin->phone }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if ($admin->role === 1)
                                                        Admin
                                                    @elseif ($admin->role === 2)
                                                        Nhân viên
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($admin->status === 1)
                                                        <span class="badge light badge-success">Hoạt động</span>
                                                    @elseif ($admin->status === 2)
                                                        <span class="badge light badge-danger">Không hoạt động</span>
                                                    @else
                                                        <span class="badge light badge-warning">Khóa</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div>

                                                        <a href="{{ route('route_BackEnd_Admin_Edit', ['id' => $admin->id]) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                        {{-- <a href="{{ route('route_BackEnd_Admin_Add')}}" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                    {{$admin_list->links('paginate.index')}} 
                </div>
            </div>
        </div>
    </div>

@endsection
