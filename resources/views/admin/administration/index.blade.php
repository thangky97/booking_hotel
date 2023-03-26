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
                            <a href="{{ route('route_BackEnd_Users_Add') }}" class="btn btn-info mb-xxl-0 mb-4"><i
                                    class="fa fa-users me-2"></i>Thêm mới</a>
                            <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
                                    class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table
                                    class="table card-table  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                                    id="guestTable-all">

                                    <thead>
                                        <tr>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Avatar</th>
                                            <th class="h5 text-center">Tên</th>
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
                                                <td class="text-primary">{{ $index + 1 }}</td>
                                                <td><img class="rounded-circle" width="90"
                                                        src="{{ asset($admin->avatar) ? '' . Storage::url($admin->avatar) : $admin->name }}"
                                                        alt=""></td>
                                                <td class="text-center">{{ $admin->name }}</td>
                                                <td class="text-center"><a
                                                        href="javascript:void(0);"><strong>{{ $admin->email }}</strong></a>
                                                </td>
                                                <td class="text-center"><a
                                                        href="javascript:void(0);"><strong>{{ $admin->phone }}</strong></a>
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
                                                    <div class="d-flex">

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
                            {{ $admin_list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
