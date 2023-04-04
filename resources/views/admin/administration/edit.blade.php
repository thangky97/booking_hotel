@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $title }} </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate
                                    action="{{ route('route_BackEnd_Admin_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" class="form-control" id="validationCustom01"
                                                        placeholder="Nhập tên.." required
                                                        value="{{ $admin->name }}">
                                                    @error('name')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="email" class="form-control" id="validationCustom02"
                                                        placeholder="Nhập email.." required
                                                        value="{{ $admin->email }}">
                                                    @error('email')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Mật khẩu
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="password" name="password" class="form-control" id="validationCustom03"
                                                        placeholder="Nhập mật khẩu.." required
                                                        value="{{ $admin->password }}">
                                                    @error('password')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="">Ảnh
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-file">
                                                        <input type="file" name="images" class="form-file-input form-control">
                                                        @if (isset($admin) && $admin->avatar)
                                                            <img src="{{ asset($admin->avatar ? '' . Storage::url($admin->avatar) : $admin->name) }}" alt="{{ $admin->name }}"
                                                                width="100">
                                                        @endif
                                                    </div>
                                                    @error('images')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Số điện
                                                    thoại
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="phone" class="form-control" id="validationCustom08"
                                                        placeholder="Nhập số điện thoại..." required
                                                        value="{{ $admin->phone }}">
                                                    @error('phone')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom07">Quyền
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="default-select wide form-control"
                                                        id="validationCustom07" name="role">
                                                        <option data-display="Chọn quyền" value="">Chọn quyền</option>
                                                        <option name="role" value="1" {{(isset($admin) && $admin->role === 1) ? 'selected' : ''}}>Admin</option>
                                                        <option name="role" value="2" {{(isset($admin) && $admin->role === 2) ? 'selected' : ''}}>Nhân viên</option>
                                                        {{-- <option name="role" value="0" {{(isset($admin) && $admin->role === 0) ? 'selected' : ''}}>Người dùng</option> --}}
                                                    </select>
                                                    @error('role')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Trạng thái
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="default-select wide form-control"
                                                        id="validationCustom05" name="status">
                                                        <option data-display="Chọn trạng thái" value="">Chọn trạng thái</option>
                                                        <option name='status' value="1" {{(isset($admin) && $admin->status === 1) ? 'selected' : ''}}>Hoạt động</option>
                                                        <option name='status' value="2" {{(isset($admin) && $admin->status === 2) ? 'selected' : ''}}>Không hoạt động</option>
                                                        <option name='status' value="0" {{(isset($admin) && $admin->status === 0) ? 'selected' : ''}}>Khóa</option>
                                                    </select>
                                                    @error('status')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                    <a href="{{ route('route_BackEnd_Admin_List') }}" class="btn btn-info">Hủy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
