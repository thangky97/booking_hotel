@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <section class="container">
            <form action="{{route('route_BackEnd_Bookings_Createuser')}}" method="post" class="row">
                @csrf
                <h1>Thông tin cá nhân</h1>
                <label for="date" class="col-1 col-form-label">Tên khách hàng</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="name"/>
                    @error('name')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-1 col-form-label">Số điện thoại</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="phone"/>
                    @error('phone')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-1 col-form-label">Email</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="email"/>
                    @error('email')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-1 col-form-label">Địa chỉ</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="address"/>
                    @error('address')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-1 col-form-label">Căn cước công dân</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="cccd"/>
                    @error('cccd')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-1 col-form-label">Ngày sinh</label>
                <div class="col-5">
                    <div class="input-group date" id="datepicker">
                        <input type="date" class="form-control" name="date" id="date"/>
                        <br>
                        @error('date')
                        <div><p class="text-danger">{{ $message }}</p></div>
                        @enderror
                    </div>
                </div>
                <label for="date" class="col-1 col-form-label">Giới tính</label>
                <div class="col-5">
                    <select name="gender" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="0" disabled selected="selected">Chọn giới tính</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                    @error('gender')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <input type="text" value="1" name="room_id" hidden/>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </section>
    </div>
