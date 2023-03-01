@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="email-left-box px-0 mb-3">
                                    <div class="p-0">
                                        <a href="" class="btn btn-primary btn-block">Thêm mới người dùng</a>
                                    </div>


                                </div>
                                <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                    <div class="compose-content">
                                        <form action="#">
                                            
                                            <div class="mb-3">
                                                <div>Họ tên</div>
                                                <input type="text" name="username" class="form-control bg-transparent"
                                                    placeholder=" Họ tên">
                                            </div>
                                            <div class="mb-3">
                                                <div>Số điện thoại</div>
                                                <input type="number" name="phone" class="form-control bg-transparent"
                                                    placeholder="Số điện thoại">
                                            </div>
                                            <div class="mb-3">
                                                <div>Email</div>
                                                <input type="email" name="email" class="form-control bg-transparent"
                                                    placeholder="Email">
                                            </div>
                                            <div class="mb-3">
                                                <div>Mật khẩu</div>
                                                <input type="password" name="password" class="form-control bg-transparent"
                                                    placeholder="Password">
                                            </div>
                                            <div class="mb-3">
                                                <div>Phân quyền</div>
                                                <select name="user-role" id="" class="form-control bg-transparent">
                                                    <option value="1">Phân quyền</option>
                                                    <option value="1">Admin</option>
                                                    <option value="1">Nhân viên</option>
                                                    <option value="1">Khách hàng</option>
                                                    <option value="1">Dev</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="mb-4"><i class="fa fa-paperclip"></i> Ảnh đại diện</h5>
                                                <form action="#" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="button"><span
                                                class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                        <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                class="me-2"><i class="fa fa-times"></i></span>Làm mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>