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
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation"
                                      action="{{route('route_BackEnd_Bookings_Create',$usernew->id)}}" method="post"
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
                                                <label class="col-lg-4 col-form-label">Giới tính
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="gender" class="default-select wide form-control">
                                                        <?php
                                                        if ($usernew->gender == 0) {
                                                            echo '
                                                                        <option value="1">Nam</option>
                                                                        <option value="0" selected="selected">Nữ</option>
                                                                    ';
                                                        } else {
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
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Cmt/Cccd
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    {{-- <input type="number" name="cccd" class="form-control"
                                                           placeholder="Nhập số cccd..." value="{{$usernew->cccd}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a password.
                                                    </div> --}}

                                                    <div class="">
                                                        <input type="file" name="images"
                                                            class="">
                                                        @if (isset($usernew) && $usernew->cccd)
                                                            <img src="{{ asset($usernew->cccd ? '' . Storage::url($usernew->cccd) : $usernew->name) }}"
                                                                alt="{{ $usernew->name }}" width="100">
                                                        @endif
                                                    </div>
                                                    {{-- @error('cccd')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror --}}
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
                                                           placeholder="Nhập số điện thoại..."
                                                           value="{{$usernew->phone}}">
                                                    <div class="invalid-feedback">
                                                        Please enter a phone no.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                        </div>
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin đặt lịch</h3>
                                        </div>
                                        <hr>
                                        <div class="col-xl-6">
                                            <input type="text" value="{{$usernew->id}}" name="user_id" hidden/>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Trạng thái thanh toán
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="status_pay" class="default-select wide form-control">
                                                        <option data-display="Chọn trạng thái thanh toán" disabled>Chọn
                                                            trạng thái thanh toán
                                                        </option>
                                                        <option value="0">Chưa thanh toán</option>
                                                        <option value="1">Đã thanh toán</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Nhân viên
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <select name="staff_id" class="default-select wide form-control">
                                                        <option data-display="Chọn nhân viên" disabled>Chọn nhân viên
                                                        </option>
                                                        @foreach($listEmployees as $employees)
                                                            <option
                                                                value="{{$employees->id}}">{{$employees->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a one.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($checkin)&&isset($checkout))
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Ngày đặt phòng
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="checkin_date" class="form-control"
                                                               value="{{$checkin}}" placeholder="Nhập ngày" readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter a password.
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($people))
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label">Nhập số người
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="people" class="form-control"
                                                                   placeholder="Nhập số người" value="{{$people}}" readonly>
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label">Nhập số người
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="number" name="people" class="form-control"
                                                                   placeholder="Nhập số người">
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Ngày trả phòng
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="date" name="checkout_date" class="form-control"
                                                               value="{{$checkout}}" placeholder="Nhập ngày" readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter a password.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="float: right;padding-left: 30px;">
                                                    <a href="{{route('route_BackEnd_Bookings_Add',$usernew->id)}}"
                                                       style="width: 140px" class="btn btn-danger light btn-sl-sm"><span
                                                            class="me-2"><i class="fa fa-times"></i></span>Thay đổi</a>
                                                </div>
                                            </div>
                                            <script>
                                                localStorage.setItem('people', 0)
                                            </script>
                                            <div>
                                                <p id="showpeople"></p>
                                            </div>
                                            <div>
                                                <div class="card-tabs mt-3 mb-xxl-0 mb-4">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        @foreach($listCaterooms as $cate_room)
                                                            <li class="nav-item <?= $cate_room->id == 1 ? 'active' : '' ?>">
                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                   href="#{{$cate_room->sort}}"
                                                                   role="tab">{{$cate_room->name}}
                                                                        <?php $i=0?>
                                                                    @foreach($listRooms as $index => $item)
                                                                        @if($cate_room->id==$item->cate_room)
                                                                            @if(empty(in_array($item->id,$listRoomwork)))
                                                                                    <?php $i++?>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    {{'('.$i.')'}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="tab-content">
                                                    @foreach($listCaterooms as $cate_room)
                                                        <div
                                                            class="tab-pane <?= $cate_room->id == 1 ? 'active show' : 'fade' ?>"
                                                            id="{{$cate_room->sort}}">
                                                            <h3>Giá phòng: {{$cate_room->price}}$</h3>
                                                            
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl "
                                                                    id="guestTable-all">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="bg-none text-center">
                                                                            <div class="form-check style-1">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox" value=""
                                                                                       id="checkAll">
                                                                            </div>
                                                                        </th>
                                                                        <th class="h5 text-center">STT</th>
                                                                        <th class="h5 text-center">Tên phòng</th>
                                                                        <th class="h5 text-center">Tầng</th>
                                                                        <th class="h5 text-center">Số người</th>
                                                                        <th class="h5 text-center">Số giường</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1 ?>
                                                                    @foreach($listRooms as $index => $item)
                                                                        @if(empty(in_array($item->id,$listRoomwork)))
                                                                            @if($cate_room->id==$item->cate_room)
                                                                                <tr>
                                                                                    <td class="text-center">
                                                                                        <div class="form-check style-1">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                onclick="addroom()"
                                                                                                type="checkbox"
                                                                                                id="checkbox_{{$item->id}}"
                                                                                                name="room_id[]"
                                                                                                value="{{$item->id}}">
                                                                                                <script>
                                                                                                    var checkbok_{{$item->id}}= document.getElementById('checkbox_{{$item->id}}')
                                                                                                    checkbok_{{$item->id}}.onclick = function (){
                                                                                                        if (this.checked){
                                                                                                            localStorage.setItem('people',Number(localStorage.getItem('people')) + Number({{$item->adult}}));
                                                                                                        }
                                                                                                        else{
                                                                                                            localStorage.setItem('people',Number(localStorage.getItem('people')) - Number({{$item->adult}}));
                                                                                                        }
                                                                                                        showpeople();
                                                                                                    }
                                                                                                </script>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="">{{$i++}}</td>
                                                                                    <td class="text-center">
                                                                                        <div class="guest-bx ">
                                                                                            <img class="me-3 "
                                                                                                 src="{{asset("storage/".$item->images)}}"
                                                                                                 alt="">
                                                                                            <div>
                                                                                                <h4 class="mb-0 mt-1"><a
                                                                                                        class="text-black"
                                                                                                        href="">{{$item->name}}</a>
                                                                                                </h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="text-center"><span>{{$item->floor}}</span></td>
                                                                                    <td class="text-center"><span>{{$item->adult}}</span></td>
                                                                                    <td class="text-center">{{$item->bed}}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input name="status_booking" value="1" hidden>
                                            <div id="showbutton"></div>
                                        @else
                                            <div class="col-xl-6">
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
                                                        @if(isset($errorin))
                                                            <div class="error1">
                                                                <p>{{$errorin}}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Nhập số người
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" name="people" class="form-control"
                                                               placeholder="Nhập số người">
                                                        <div class="invalid-feedback">
                                                            Please enter a password.
                                                        </div>
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
                                                        @if(isset($errorout))
                                                            <div class="error">
                                                                <p>{{$errorout}}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" style="float: right;padding-left: 30px;">
                                                    <button type="submit" class="btn btn-primary"><span class="me-2"><i
                                                                class="fa fa-paper-plane"></i></span>Tìm phòng
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(isset($people))
    <script>
        function showpeople() {
            document.getElementById('showpeople').innerHTML = 'Số người: ' + localStorage.getItem('people') + '/' + {{$people}};
            if (Number(localStorage.getItem('people')) < Number({{$people}}) || (Number({{$people}})+3) < Number(localStorage.getItem('people'))) {
                document.getElementById("showpeople").style.color = 'red';
                document.getElementById('showbutton').innerHTML = '<div class="btn btn-danger" style="width: 100%">' + '<span class="me-2">' + '<i class="fa fa-paper-plane">' + '</i>' + '</span>' + 'Thêm mới' + '</div>';
            } else {
                document.getElementById("showpeople").style.color = 'green';
                document.getElementById('showbutton').innerHTML = '<button type="submit" class="btn btn-primary" style="width: 100%">' + '<span class="me-2">' + '<i class="fa fa-paper-plane">' + '</i>' + '</span>' + 'Thêm mới' + '</button>';
            }
        }
    </script>
@endif
