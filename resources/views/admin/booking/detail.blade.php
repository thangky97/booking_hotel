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
                        <h2 <?= $booking->status_pay == 1 ? 'class="text-success"' : 'class="text-danger"' ?>>Đơn đặt phòng ID:#{{$booking->id}}</h2>
                    </div>
                    <div class="card-header border-0 pb-0">
                        <div class="me-5 mb-sm-0 mb-3 ">
                            <div class="row-xl-9">
                                <div >
                                    <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng</p>
                                    <h4 class="mb-0 card-title">{{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h4>
                                </div>
                                
                                <hr style=" margin-right: 15px">
                                <div >
                                    <p class="mb-2"><i class="far fa-user scale3 me-3"></i>Số người</p>
                                    <h4 class="mb-0 card-title">{{$booking->people}} Người</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-left: 15px; margin-right: 15px">
                    <div>
                        <div class="tab-content">
                            <div class="table-responsive">
                                <table class="table card-table display">
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
                                                        <h4 class="mb-0 mt-1"><a class="text-black" href="">{{$item->name}}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$cate->name}}</td>
                                            <td class="text-center">
                                                <?php $service_ids =  explode(",", $item->service_id) ?>
                                                @foreach($listServices as $service)
                                                @foreach($service_ids as $service_id)
                                                @if($service->id==$service_id)
                                                {{$service->name}}<br>
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
                    

                    <hr style="margin-left: 15px; margin-right: 15px">
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
            <div class="col-xl-12">
                <div class="d-flex align-items-center rooms flex-wrap">
                    <h4 class="me-auto mb-3">Lịch sử đặt phòng</h4>
                    <div class="mb-3">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table  display mb-4 dataTablesCard booking-table table-responsive-lg " id="guestTable-all">
                        <thead>
                            <tr>
                                <th class="bg-none">
                                    <div class="form-check style-1">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                    </div>
                                </th>
                                <th>Khách Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Ngày Trả</th>
                                <th>Số Người</th>
                                <th>Thanh Toán</th>
                                <th>Nhân Viên</th>
                                <th class="bg-none">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($history as $bk_history)
                            <tr>
                                <td>
                                    <div class="form-check style-1">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>

                                <td>
                                    <p>
                                        @foreach ($listUsers as $user_bk)
                                        <?php if ($bk_history->user_id == $user_bk->id) {
                                            echo $user_bk->name;
                                        } ?>
                                        @endforeach
                                    </p>
                                </td>
                                <td>
                                    <div style="width: 100px">
                                        <h6>{{$bk_history->checkin_date}}</h6>
                                        <span class="fs-14">08:29 AM</span>
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 100px">
                                        <h6>{{$bk_history->checkout_date}}</h6>
                                        <span class="fs-14">08:29 AM</span>
                                    </div>
                                </td>
                                <td>
                                    <p>{{$bk_history->people}}</p>
                                </td>

                                <td>
                                    <span class="fs-16">
                                        <?= $bk_history->status_pay == 1 ? '<span class="badge light badge-success">Đã thanh toán</span>' : '<span class="badge light badge-danger">Chưa thanh toán</span>' ?>
                                    </span>
                                </td>
                                <td>
                                    <p style="width: 150px">
                                        @if($bk_history->staff_id==1)
                                        {{'Huy Hoàng'}}
                                        @elseif($bk_history->staff_id==2)
                                        {{'Nguyễn Văn Linh'}}
                                        @else
                                        {{'Đinh Trung Nguyên'}}
                                        @endif
                                    </p>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$bk_history->id)}}">Chi tiết</a>
                                            @if(in_array($bk_history->id,$list))
                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bill',$bk_history->id)}}">Xem Bill</a>
                                            @else
                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bill_Room',$bk_history->id)}}">Tạo Bill</a>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>