@extends('templates/admin.layoutadmin')
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
                            <h4 class="card-title">Thêm</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate action="" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" class="form-control"
                                                        id="validationCustom01" placeholder="Nhập tên..." required
                                                        value="@isset($request['name']){{ $request['name'] }}@endisset">
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
                                                    <input type="text" name="email" class="form-control"
                                                        id="validationCustom02" placeholder="Nhập email..." required
                                                        value="@isset($request['email']){{ $request['email'] }}@endisset">
                                                    @error('email')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Cmt/Cccd
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-file">
                                                        <input type="file" name="images"
                                                            class="form-file-input form-control">
                                                        @if (isset($user) && $user->cccd)
                                                            <img src="{{ asset($user->cccd) }}" alt="{{ $user->name }}"
                                                                width="100">
                                                        @endif
                                                        @error('images')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Giới tính
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="gender" class="default-select wide form-control"
                                                        id="validationCustom05">
                                                        <option data-display="Chọn giới tính" value="">Giới tính
                                                        </option>
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                    @error('gender')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Địa chỉ
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" class="form-control"
                                                        id="validationCustom03" placeholder="Nhập địa chỉ..." required
                                                        value="@isset($request['address']){{ $request['address'] }}@endisset">
                                                    @error('address')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Ngày sinh
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date" class="form-control"
                                                        id="validationCustom03" class="picker"
                                                        placeholder="Nhập mật khẩu..." required
                                                        value="@isset($request['date']){{ $request['date'] }}@endisset">
                                                    @error('date')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Số điện
                                                    thoại
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="phone" class="form-control"
                                                        id="validationCustom08" placeholder="Nhập số điện thoại..."
                                                        required
                                                        value="@isset($request['phone']){{ $request['phone'] }}@endisset">
                                                        @error('phone')
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
                                                    <select name="status" class="default-select wide form-control"
                                                        id="validationCustom05">
                                                        <option data-display="Chọn trạng thái" value="">Trạng thái</option>
                                                        <option value="1">Hoạt động</option>
                                                        <option value="2">Không hoạt động</option>
                                                        <option value="0">Khóa</option>
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
                                                    <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                            class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm
                                                        mới</button>
                                                    <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                                class="fa fa-times"></i></span><a
                                                            href="{{ route('route_BackEnd_Users_List') }}">Quay Lại</a>
                                                    </div>
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
