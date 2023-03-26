@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-8">

                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h2 <?= $booking->status_pay == 1 ? 'class="text-success"' : 'class="text-danger"' ?>>Bill thanh toán phòng ID:#{{$booking->id}}</h2>
                    </div>
                    <div class="card-header border-0 pb-0">
                        <div class="me-5 mb-sm-0 mb-3">
                            <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng</p>
                            <h4 class="mb-0 card-title">{{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h4>
                        </div>
                    </div>
                    <hr style="margin-left: 15px; margin-right: 15px">
                    <div class="card-body d-flex pt-0 align-items-center flex-wrap">
                        <div class="d-flex align-items-center me-5 pe-4 mb-xxl-0 mb-2" style="width: 100%">
                            <div>
                                <h2 class="card-title mb-0">Tổng số phòng sử dụng : {{$count}} Phòng</h2>
                            </div>
                        </div>


                    </div>
                    <div>                     
                            <table class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-mg " id="guestTable-all">
                                <thead>
                                    <tr>
                                        <th>Tên phòng</th>
                                        <th>Loại phòng</th>
                                        <th>Đơn giá</th>
                                        <th class="bg-none">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookingDetails as $bookingDetail)
                                    @foreach($listRooms as $room)
                                    @if($bookingDetail->room_id==$room->id)
                                    @foreach($listCaterooms as $cateRoom)
                                    @if($room->cate_room==$cateRoom->id)
                                    <tr>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="{{asset("storage/".$room->images)}}" alt="">
                                                <div>
                                                    <span class="text-primary">#{{$booking->id}}</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black" href="">{{$room->name}}</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="guest-bx">
                                                {{$cateRoom->name}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-primary d-block guest-bx">
                                                {{$cateRoom->price}}$
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block guest-bx">
                                                    {{($cateRoom->price)*$use_date}}$
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-sm-flex d-block align-items-center flex-wrap">
                                                <div class="me-10 mb-sm-0 mb-3">
                                                    <h3 class="mb-2">Tổng</h3>
                                                    <hr style="margin-left: 15px; margin-right: 15px">
                                                    <h3 class="mb-0 card-title" style="color: blue;"><b><var>{{$total_money_room}}$</var></b></h3>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr style="margin-left: 15px; margin-right: 15px">
                            <br>
                            <div class="" style="text-align: center;">
                                <div class="me-10 mb-sm-0 mb-3">
                                    <a href="{{route('route_BackEnd_Bill_Service',$booking->id)}}"  class="btn btn-info mb-xxl-0 mb-4 btn-submit"><i class="flaticon-022-copy"></i>Tiếp Tục</a>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>


            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="card profile-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('admin/images/profile/10.jpg')}}" alt="" class="rounded profile-img me-4">
                            <div>
                                <h5 class="text-primary">#Khách hàng</h5>
                                <h4 class="mb-0">{{$user->name}}</h4>
                            </div>
                        </div>
                        <hr>
                        <ul class="user-info-list">
                            <li>
                                <i class="fas fa-phone-volume"></i>
                                <span>{{$user->phone}}</span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <span class="overflow-hidden">{{$user->email}}</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$user->address}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>