@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <section class="container">
            <form action="{{route('route_BackEnd_Bookings_Create')}}" method="post" class="row">
            @csrf
            <h1>Thông tin cá nhân</h1>
            <label for="date" class="col-1 col-form-label">Tên khách hàng</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{$usernew->name}}" name="name"/>
            </div>
            <label for="date" class="col-1 col-form-label">Số điện thoại</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{$usernew->phone}}" name="phone"/>
            </div>
            <label for="date" class="col-1 col-form-label">Email</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{$usernew->email}}" name="email"/>
            </div>
            <label for="date" class="col-1 col-form-label">Địa chỉ</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{$usernew->address}}" name="address"/>
            </div>
            <label for="date" class="col-1 col-form-label">Căn cước công dân</label>
            <div class="col-5">
                <input type="text" class="form-control" value="{{$usernew->cccd}}" name="cccd"/>
            </div>
            <label for="date" class="col-1 col-form-label">Ngày sinh</label>
            <div class="col-5">
                <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control" value="{{$usernew->date}}" name="date" id="date"/>
                </div>
            </div>
            <label for="date" class="col-1 col-form-label">Giới tính</label>
            <div class="col-5">
                <select name="gender" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
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
            </div>
            <br>
            <h1>Thông tin Booking</h1>
            <input type="text" value="{{$usernew->id}}" name="user_id" hidden/>
            <label for="date" class="col-1 col-form-label">Ngày đăt</label>
            <div class="col-5">
                <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control" name="checkin_date" id="date"/>
                </div>
                @error('checkin_date')
                <div><p class="text-danger">{{ $message }}</p></div>
                @enderror
            </div>
            <label for="date" class="col-1 col-form-label">Ngày trả</label>
            <div class="col-5">
                <div class="input-group date" id="datepicker">
                    <input type="date" class="form-control" name="checkout_date" id="date"/>
                </div>
                @error('checkout_date')
                <div><p class="text-danger">{{ $message }}</p></div>
                @enderror
            </div>
            <label for="date" class="col-1 col-form-label">Số người</label>
            <div class="col-5">
                <select name="people" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected="selected" disabled>Chọn số người</option>
                    <option value="1">1 người</option>
                    <option value="2">2 người</option>
                    <option value="3">3 người</option>
                    <option value="4">4 người</option>
                    <option value="5">5 người</option>
                </select>
                @error('people')
                <div><p class="text-danger">{{ $message }}</p></div>
                @enderror
            </div>
            <label for="date" class="col-1 col-form-label">Nhân viên</label>
            <div class="col-5">
                <select name="staff_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected="selected" disabled>Chọn nhân viên</option>
                    <option value="1">Nguyễn Đình Huân</option>
                    <option value="2">Nguyễn Văn Linh</option>
                    <option value="3">Đinh Trung Nguyên</option>
                </select>
                @error('staff_id')
                <div><p class="text-danger">{{ $message }}</p></div>
                @enderror
            </div>
            <label for="date" class="col-1 col-form-label">Trạng thái thanh toán</label>
            <div class="col-5">
                <select name="status_pay" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="1">Chưa thanh toán</option>
                    <option value="2">Đã thanh toán</option>
                </select>
                @error('status_pay')
                <div><p class="text-danger">{{ $message }}</p></div>
                @enderror
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
                                        <th class="h5">STT</th>
                                        <th class="h5">Tên phòng</th>
                                        <th class="h5">Hình ảnh</th>
                                        <th class="h5">Mô tả</th>
                                        <th class="h5">Số giường</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1?>
                                    @foreach($listRooms as $index => $item)
                                        @if($cate_room->id==$item->cate_room)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->images}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->bed}}</td>
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
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
            </section>
        </div>
