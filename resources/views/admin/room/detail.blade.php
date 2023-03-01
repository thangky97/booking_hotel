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
                                        <a href="" class="btn btn-primary btn-block">Sửa thông tin phòng</a>
                                    </div>


                                </div>
                                <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                    <div class="compose-content">
                                        <form action="#">

                                            <div class="mb-3">
                                                <div>Tên phòng</div>
                                                <input type="text" name="username" class="form-control bg-transparent"
                                                    placeholder=" Tên phòng">
                                            </div>

                                            <div class="mb-3">
                                                <div>Kiểu phòng</div>
                                                <select name="user-role" id="" class="form-control bg-transparent">
                                                    <option value="1" selected>Phòng thường</option>
                                                    <option value="2">Phòng vip</option>
                                                    <option value="3">Phòng cao cấp</option>
                                                    <option value="4">Phòng dịch vụ</option>
                                                    <option value="5">Phòng thương gia</option>

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div>Loại phòng</div>
                                                <select name="user-role" id="" class="form-control bg-transparent">
                                                    <option value="1" selected>Single Bed</option>
                                                    <option value="2">Double Bed</option>
                                                    <option value="3">Queen Bed</option>
                                                    <option value="4">King Room</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div>Tầng</div>
                                                <select name="user-role" id="" class="form-control bg-transparent">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div>Giá</div>
                                                <input type="number" name="price" class="form-control bg-transparent"
                                                    placeholder="Giá phòng $">
                                            </div>
                                            <div class="mb-3">
                                                <div>Trạng thái</div>
                                                <select name="user-role" id="" class="form-control bg-transparent">
                                                    <option value="1" selected>Có thể dùng</option>
                                                    <option value="2">Đã sử dụng</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 row">
                                                <div>Tiện ích</div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Điều hòa
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Tivi
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Wifi
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Bồn tắm
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Máy sấy
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Máy pha cafe
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Lan can
                                                        </label>
                                                    </div>
                                                </div>
                                                <h5 class="mb-4"><i class="fa fa-paperclip"></i> Đính kèm File</h5>
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
                                                class="me-2"><i class="fa fa-paper-plane"></i></span>Cập nhật</button>
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