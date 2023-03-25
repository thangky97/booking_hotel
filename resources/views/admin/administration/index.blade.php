@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div id="msg-box">
                    <?php //Hiển thị thông báo thành công
                    ?>
                    @if (Session::has('success'))
                        <div class="alert alert-success solid alert-end-icon alert-dismissible fade show" role="alert">
                            <span><i class="mdi mdi-check"></i></span>
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <?php //Hiển thị thông báo lỗi
                    ?>
                    @if (Session::has('error'))
                        <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show" role="alert">
                            <span><i class="mdi mdi-help"></i></span>
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="btn-close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-bs-dismiss="alert" aria-label="btn-close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                </div>
                {{-- @if (count($admin) <= 0)
                    <p class="alert alert-warning">
                        Không có dữ liệu phù hợp
                    </p>
                @endif --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profile Datatable</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('route_BackEnd_Admin_Add')}}" class="btn btn-rounded btn-success mb-xxl-0 mb-4"><span
                                class="btn-icon-start text-success"><i class="fa fa-user color-info"></i>
                            </span>Thêm</a>
                            <div class="table-responsive">
                                <table id="example3" class="table table-striped default-table table-responsive-sm"
                                    style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Avatar</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin_list as $index => $admin)
                                            <tr>
                                                <td class="text-primary">{{ $index + 1 }}</td>
                                                <td><img class="rounded-circle" width="35"
                                                        src="{{ asset($admin->avatar) ? '' . Storage::url($admin->avatar) : ($admin->name) }}" alt=""></td>
                                                <td>{{ $admin->name }}</td>
                                                <td><a href="javascript:void(0);"><strong>{{ $admin->email }}</strong></a>
                                                </td>
                                                <td><a href="javascript:void(0);"><strong>{{ $admin->phone }}</strong></a>
                                                </td>
                                                <td>
                                                    @if ($admin->role === 1)
                                                        Admin
                                                    @elseif ($admin->role === 2)
                                                        Nhân viên
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin->status === 1)
                                                        <span class="badge light badge-success">Hoạt động</span>
                                                    @elseif ($admin->status === 2)
                                                        <span class="badge light badge-danger">Không hoạt động</span>
                                                    @else
                                                        <span class="badge light badge-warning">Khóa</span>
                                                    @endif
                                                </td>

                                                <td>
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
