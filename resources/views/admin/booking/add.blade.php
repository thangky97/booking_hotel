@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <form action="{{route('admin.booking.update')}}" method="post">
            @csrf
            <div>
                <p>Người dùng</p>
                <input type="text" name="user_id">
            </div>
            <div>
                <p>Ngày đặt</p>
                <input type="date" name="checkin_date">
            </div>
            <div>
                <p>Ngày trả</p>
                <input type="date" name="checkout_date">
            </div>
            <div>
                <p>Số người</p>
                <input type="number" name="people">
            </div>
            <div>
                <p>Loại phòng</p>
                <input type="number" name="cate_room_id">
            </div>
            <div>
                <p>Trạng thái đơn</p>
                <input type="number" name="status_booking">
            </div>
            <div>
                <p>Trạng thái thanh toán</p>
                <input type="number" name="status_pay">
            </div>
            <div>
                <p>Nhân viên</p>
                <input type="number" name="staff_id">
            </div>
        </form>
        </div>