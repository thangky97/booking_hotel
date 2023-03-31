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
                            <h2 <?= $booking->status_pay==1?'class="text-success"':'class="text-danger"'?>>Đơn đặt phòng ID:#{{$booking->id}}</h2>
                        </div>
                        <div class="card-header border-0 pb-0">
                            <div class="me-5 mb-sm-0 mb-3">
                                <p class="mb-2"><i class="far fa-user scale3 me-3"></i>Số người</p>
                                <h4 class="mb-0 card-title">{{$booking->people}}</h4>
                            </div>
                        </div>
                        <div class="card-header border-0 pb-0">
                            <div class="me-5 mb-sm-0 mb-3">
                                <p class="mb-2"><i class="fas fa-bed scale3 me-3"></i>Giá phòng</p>
                                <h4 class="mb-0 card-title">{{$price}}$</h4>
                            </div>
                        </div>
                        <div class="card-header border-0 pb-0">
                            <div class="me-5 mb-sm-0 mb-3">
                                <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng</p>
                                <h4 class="mb-0 card-title">{{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h4>
                            </div>
                        </div>
                        <hr style="margin-left: 15px; margin-right: 15px">
                        <div>
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table
                                        class="table card-table display">
                                        <thead>
                                        <tr>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Tên phòng</th>
                                            <th class="h5 text-center">Loại phòng</th>
                                            <th class="h5 text-center">Dịch vụ</th>
                                            <th class="h5 text-center">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($listRooms as $index => $item)
                                            @foreach($listCaterooms as $cate)
                                                @if($item->cate_room==$cate->id)
                                                    <tr>
                                                        <td class="text-center">{{$i++}}</td>
                                                        <td class="text-center">
                                                            <div class="guest-bx" style="justify-content: center;">
                                                                <div>
                                                                    <h4 class="mb-0 mt-1"><a
                                                                            class="text-black"
                                                                            href="">{{$item->name}}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">{{$cate->name}}</td>
                                                        <td class="text-center">
                                                                <?php $service_ids =  explode(",",$item->service_id)?>
                                                            @foreach($listServices as $service)
                                                                @foreach($service_ids as $service_id)
                                                                    @if($service->id==$service_id)
                                                                        @if($service->$price!=0)
                                                                            {{$service->name}}<br>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            @if($item->service_id)
                                                                <a href="{{route('route_BackEnd_Bookings_Editservice',$item->id)}}"><button class="btn btn-primary">Sửa</button></a>
                                                            @else
                                                                <a href="{{route('route_BackEnd_Bookings_Editservice',$item->id)}}"><button class="btn btn-success">Thêm</button></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="owl-carousel gallery-carousel owl-theme pb-3">
                                <div class="item">
                                    <img src="{{ asset('admin/images/hotel/pic1.jpg')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('admin/images/hotel/pic2.jpg')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('admin/images/hotel/pic3.jpg')}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('admin/images/hotel/pic4.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="d-flex mt-4 flex-wrap">
                                <h4 class="card-title me-auto">Tiện nghi :</h4>
                                <h5 class="card-title">Điều hòa, Phòng tắm, Giường Đôi, Tồn tắm, Máy pha cà phê, Tivi, Wifi</h5>
                            </div>
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
