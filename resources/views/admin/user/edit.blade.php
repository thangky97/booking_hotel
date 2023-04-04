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
                            <h4 class="card-title">Sửa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate
                                    action="{{ route('route_BackEnd_Users_Update', ['id' => request()->route('id')]) }}"
                                    method="post" enctype="multipart/form-data">
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
                                                        value="{{ $users->name }}">
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
                                                        value="{{ $users->email }}">
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
                                                        @if (isset($users) && $users->cccd)
                                                            <img src="{{ asset($users->cccd ? '' . Storage::url($users->cccd) : $users->name) }}"
                                                                alt="{{ $users->name }}" width="100">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Giới tính
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="gender" class="default-select wide form-control"
                                                        id="validationCustom05">
                                                        <option data-display="Chọn giới tính" value="">Giới tính</option>
                                                        <option value="1"
                                                            {{ isset($users) && $users->gender === 1 ? 'selected' : '' }}>
                                                            Nam</option>
                                                        <option value="2"
                                                            {{ isset($users) && $users->gender === 2 ? 'selected' : '' }}>
                                                            Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Địa chỉ
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" class="form-control"
                                                        id="validationCustom03" placeholder="Nhập địa chỉ..." required
                                                        value="{{ $users->address }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Ngày sinh
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date" class="form-control"
                                                        id="validationCustom03" placeholder="Nhập mật khẩu..." required
                                                        value="{{ $users->date }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Số điện
                                                    thoại
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="phone" class="form-control"
                                                        id="validationCustom08" placeholder="Nhập số điện thoại..." required
                                                        value="{{ $users->phone }}">
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
                                                        <option data-display="Chọn trạng thái" value="">Trạng thái
                                                        </option>
                                                        <option value="1"
                                                            {{ isset($users) && $users->status === 1 ? 'selected' : '' }}>
                                                            Hoạt động</option>
                                                        <option value="2"
                                                            {{ isset($users) && $users->status === 2 ? 'selected' : '' }}>
                                                            Không hoạt động</option>
                                                        <option value="0"
                                                            {{ isset($users) && $users->status === 0 ? 'selected' : '' }}>
                                                            Khóa</option>
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
                                                    <a href="{{ route('route_BackEnd_Users_List') }}"
                                                        class="btn btn-info">Hủy</a>
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
