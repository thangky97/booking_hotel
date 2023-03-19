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
                            <h4 class="card-title">Nhập thông tin khách hàng</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" action="{{route('route_BackEnd_Bookings_Createuser')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Tên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Nhập tên...">
                                                    <div class="invalid-feedback">
                                                        Please enter a username.
                                                    </div>
                                                    @error('name')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="email" class="form-control"
                                                           placeholder="Nhập email...">
                                                    <div class="invalid-feedback">
                                                        Please enter a Email.
                                                    </div>
                                                    @error('email')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Cmt/Cccd
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="cccd" class="form-control"
                                                           placeholder="Nhập số cccd...">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                    @error('cccd')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Giới tính
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="gender" class="default-select wide form-control">

                                                        <option data-display="Chọn giới tính" disabled>Giới tính</option>
                                                        <option value="1">Nam</option>
                                                        <option value="2">Nữ</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                    @error('gender')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Địa chỉ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" class="form-control"
                                                           placeholder="Nhập địa chỉ...">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                    @error('address')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày sinh
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date" class="form-control"
                                                           placeholder="Nhập ngày">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                    @error('date')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                    @if(isset($error))
                                                        <div class="error">
                                                            <p>{{$error}}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Số điện
                                                    thoại
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="phone" class="form-control"
                                                           placeholder="Nhập số điện thoại...">
                                                    <div class="invalid-feedback">
                                                        Please enter a phone no.
                                                    </div>
                                                    @error('phone')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Trạng thái
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="status" class="default-select wide form-control">

                                                        <option data-display="Chọn trạng thái" disabled>Trạng thái</option>
                                                        <option value="1">Hoạt động</option>
                                                        <option value="2">Không hoạt động</option>
                                                        <option value="0">Khóa</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                    @error('status')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <input name="room_id" value="1" hidden>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                                                class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                                    <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                                class="fa fa-times"></i></span><a
                                                            href="{{ route('route_BackEnd_Bookings_List') }}">Quay Lại</a></div>
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
