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
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" action="{{route('route_BackEnd_Bookings_Create')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin khách hàng</h3>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Tên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Nhập tên..." value="{{$usernew->name}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a username.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Email <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="email" class="form-control"
                                                           placeholder="Nhập email..." value="{{$usernew->email}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a Email.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Cmt/Cccd
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="cccd" class="form-control"
                                                           placeholder="Nhập số cccd..." value="{{$usernew->cccd}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Giới tính
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="gender" class="default-select wide form-control">
                                                        <?php
                                                            if($usernew->gender==0){
                                                                echo '
                                                                        <option value="1">Nam</option>
                                                                        <option value="0" selected="selected">Nữ</option>
                                                                    ';
                                                            }else{
                                                                echo '
                                                                        <option value="1" selected="selected">Nam</option>
                                                                        <option value="0">Nữ</option>
                                                                    ';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Địa chỉ
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="address" class="form-control"
                                                           placeholder="Nhập địa chỉ..." value="{{$usernew->address}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày sinh
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date" class="form-control"
                                                           placeholder="Nhập ngày" value="{{$usernew->date}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Số điện
                                                    thoại
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="phone" class="form-control"
                                                           placeholder="Nhập số điện thoại..." value="{{$usernew->phone}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a phone no.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin đặt lịch</h3>
                                        </div>
                                        <hr>
                                        <div class="col-xl-6">
                                            <input type="text" value="{{$usernew->id}}" name="user_id" hidden/>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày đặt phòng
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="checkin_date" class="form-control"
                                                           placeholder="Nhập ngày">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                    @error('checkin_date')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Số người
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="people" class="default-select wide form-control">
                                                        <option data-display="Chọn số người" disabled>Chọn số người</option>
                                                        <option value="1">1 người</option>
                                                        <option value="2">2 người</option>
                                                        <option value="3">3 người</option>
                                                        <option value="4">4 người</option>
                                                        <option value="5">5 người</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                    @error('people')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Trạng thái thanh toán
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="status_pay" class="default-select wide form-control">
                                                        <option data-display="Chọn trạng thái thanh toán" disabled>Chọn trạng thái thanh toán</option>
                                                        <option value="1">Chưa thanh toán</option>
                                                        <option value="0">Đã thanh toán</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                    @error('status_pay')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày trả phòng
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="checkout_date" class="form-control"
                                                           placeholder="Nhập ngày">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div>
                                                    @error('checkout_date')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Nhân viên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="staff_id" class="default-select wide form-control">
                                                        <option data-display="Chọn nhân viên" disabled>Chọn nhân viên</option>
                                                        <option value="1">Nguyễn Đình Huân</option>
                                                        <option value="2">Nguyễn Văn Linh</option>
                                                        <option value="3">Đinh Trung Nguyên</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                    @error('staff_id')
                                                    <div><p class="text-danger">{{ $message }}</p></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card-tabs mt-3 mb-xxl-0 mb-4">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    @foreach($listCaterooms as $cate_room)
                                                        <li class="nav-item <?=$cate_room->id==1?'active':''?>">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#{{$cate_room->sort}}" role="tab">{{$cate_room->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="tab-content">
                                                @foreach($listCaterooms as $cate_room)
                                                    <div class="tab-pane <?=$cate_room->id==1?'active show':'fade'?>" id="{{$cate_room->sort}}">
                                                        <h3>Giá phòng: {{$cate_room->price}}$</h3>
                                                        <div class="table-responsive">
                                                            <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                                                <thead>
                                                                <tr>
                                                                    <th class="bg-none text-center">
                                                                        <div class="form-check style-1">
                                                                            <input class="form-check-input" type="checkbox" value=""
                                                                                   id="checkAll">
                                                                        </div>
                                                                    </th>
                                                                    <th class="h5 text-center">STT</th>
                                                                    <th class="h5 text-center">Tên phòng</th>
                                                                    <th class="h5 text-center">Hình ảnh</th>
                                                                    <th class="h5 text-center">Mô tả</th>
                                                                    <th class="h5 text-center">Số giường</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i=1?>
                                                                @foreach($listRooms as $index => $item)
                                                                    @if($cate_room->id==$item->cate_room)
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                <div class="form-check style-1">
                                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">{{$i++}}</td>
                                                                            <td class="text-center">{{$item->name}}</td>
                                                                            <td class="text-center">{{$item->images}}</td>
                                                                            <td class="text-center">{{$item->description}}</td>
                                                                            <td class="text-center">{{$item->bed}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><span class="me-2"><i
                                                    class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
