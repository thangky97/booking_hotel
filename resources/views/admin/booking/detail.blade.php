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
                                    <p class="mb-2"><i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng phòng</p>
                                    <h4 class="mb-0 card-title">{{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h4>
                                </div>
                            </div>
                            <hr style="margin-left: 15px; margin-right: 15px">
                            @foreach($bookingDetails as $bookingDetail)
                                @foreach($listRooms as $room)
                                    @if($bookingDetail->room_id==$room->id)
                                        @foreach($listCaterooms as $cateRoom)
                                            @if($room->cate_room==$cateRoom->id)
                                                <div class="card-body d-flex pt-0 align-items-center flex-wrap">
                                                    <div class="d-flex align-items-center me-5 pe-4 mb-xxl-0 mb-2" style="width: 100%">
                                                        <div>
                                                            <h2 class="card-title mb-0">{{$room->name}}</h2>
                                                        </div>
                                                    </div>
                                                    <div class="d-sm-flex d-block align-items-center flex-wrap">
                                                        <div class="me-5 mb-sm-0 mb-3">
                                                            <p class="mb-2"><i class="far fa-user scale3 me-3"></i>Loại phòng</p>
                                                            <h4 class="mb-0 card-title">{{$cateRoom->name}}</h4>
                                                        </div>
                                                        <div class="me-5 mb-sm-0 mb-3">
                                                            <p class="mb-2"><i class="fas fa-bed scale3 me-3"></i>Giá phòng</p>
                                                            <h4 class="mb-0 card-title">{{$cateRoom->price}}$</h4>
                                                        </div>
                                                        <div class="me-5 mb-sm-0 mb-3">
                                                            <p class="mb-2"><i class="fas fa-bed scale3 me-3"></i>Số giường</p>
                                                            <h4 class="mb-0 card-title">{{$room->bed}}</h4>
                                                        </div>
                                                        <div class="me-5 mb-sm-0 mb-3">
                                                            <p class="mb-2"><i class="far fa-user scale3 me-3"></i>Số người</p>
                                                            <h4 class="mb-0 card-title">{{$room->adult}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
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
