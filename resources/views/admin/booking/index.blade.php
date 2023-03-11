@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
							<div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
								<ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
                                    </li>
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#Active" role="tab">Còn hạn</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Canceled" role="tab">Hết hạn</a>
									</li>
								</ul>
							</div>
							<div class="table-search">
								<div class="input-group search-area mb-xxl-0 mb-4">
									<input type="text" class="form-control" placeholder="Tìm kiếm ">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
							<a href="{{route('route_BackEnd_Bookings_Adduser')}}" class="btn btn-primary mb-xxl-0 mb-4 "><i class="far fa-file-word me-2"></i>Thêm mới</a>
						</div>
						<div class="tab-content">
							<div class="tab-pane active show" id="Active">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
                                                <th class="h5">STT</th>
                                                <th class="h5">Khách hàng</th>
												<th class="h5">Ngày đặt</th>
												<th class="h5">Ngày trả</th>
												<th class="h5">Số người</th>
												<th class="h5">Loại phòng</th>
												<th class="h5">Thanh toán</th>
												<th class="h5">Nhân viên</th>
												<th class="h5">Hành động</th>
											</tr>
										</thead>
                                        <tbody>
                                        <?php $i=1?>
                                        @foreach($listBookings as $index => $item)
                                            @if($item->status_booking==1)
                                            <tr>
                                                <td>
                                                    {{$i++}}
                                                </td>
                                                <td>
                                                    <p>
                                                        @foreach ($listUsers as $user)
                                                            <?php if($item->user_id==$user->id){
                                                                echo $user->name;
                                                            }?>
                                                       @endforeach
                                                    </p>
                                                </td>
                                                <td>
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkin_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkout_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>{{$item->people}}</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        @foreach ($listCaterooms as $cate)
                                                                <?php if($item->cate_room_id==$cate->id){
                                                                echo $cate->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td><div style="width: 150px"><?= $item->status_pay==0?'<p class="text-danger">Chưa thanh toán</p>':'<p class="text-success">Đã thanh toán</p>'?></div></td>
                                                <td><p style="width: 150px">
                                                        @if($item->staff_id==1)
                                                            {{'Nguyễn Đình Huân'}}
                                                        @elseif($item->staff_id==2)
                                                            {{'Nguyễn Văn Linh'}}
                                                        @else
                                                            {{'Đinh Trung Nguyên'}}
                                                       @endif
                                                        </p></td>
                                                <td style="display: flex">
                                                    <a href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}" style="width: 100px"><button class="btn btn-success">Chi tiết</button></a>
                                                    <a href="{{url(('/bookings/'.$item->id))}}" style="margin-left: 10px"><button class="btn btn-primary">Sửa</button></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="All">
                                <div class="table-responsive">
                                    <a href="{{route('route_BackEnd_Bookings_Adduser')}}">Thêm mới</a>
                                    <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                        <thead>
                                        <tr>
                                            <th class="h5">STT</th>
                                            <th class="h5">Khách hàng</th>
                                            <th class="h5">Ngày đặt</th>
                                            <th class="h5">Ngày trả</th>
                                            <th class="h5">Số người</th>
                                            <th class="h5">Loại phòng</th>
                                            <th class="h5">Thanh toán</th>
                                            <th class="h5">Nhân viên</th>
                                            <th class="h5">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $j=1?>
                                        @foreach($listBookings as $index => $item)
                                            <tr>
                                                <td>
                                                    {{$j++}}
                                                </td>
                                                <td>
                                                    <p>
                                                        @foreach ($listUsers as $user)
                                                                <?php if($item->user_id==$user->id){
                                                                echo $user->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td>
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkin_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkout_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p>{{$item->people}}</p>
                                                </td>
                                                <td>
                                                    <p>
                                                        @foreach ($listCaterooms as $cate)
                                                                <?php if($item->cate_room_id==$cate->id){
                                                                echo $cate->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td><div style="width: 150px"><?= $item->status_pay==0?'<p class="text-danger">Chưa thanh toán</p>':'<p class="text-success">Đã thanh toán</p>'?></div></td>
                                                <td><p style="width: 150px">
                                                        @if($item->staff_id==1)
                                                            {{'Nguyễn Đình Huân'}}
                                                        @elseif($item->staff_id==2)
                                                            {{'Nguyễn Văn Linh'}}
                                                        @else
                                                            {{'Đinh Trung Nguyên'}}
                                                        @endif
                                                    </p></td>
                                                <td style="display: flex">
                                                    <a href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}" style="width: 100px"><button class="btn btn-success">Chi tiết</button></a>
                                                    <a href="{{url(('/bookings/'.$item->id))}}" style="margin-left: 10px"><button class="btn btn-primary">Sửa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
							</div>
							<div class="tab-pane fade" id="Canceled">
                                <div class="table-responsive">
                                    <a href="{{route('route_BackEnd_Bookings_Adduser')}}">Thêm mới</a>
                                    <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                        <thead>
                                        <tr>
                                            <th class="h5">STT</th>
                                            <th class="h5">Khách hàng</th>
                                            <th class="h5">Ngày đặt</th>
                                            <th class="h5">Ngày trả</th>
                                            <th class="h5">Số người</th>
                                            <th class="h5">Loại phòng</th>
                                            <th class="h5">Thanh toán</th>
                                            <th class="h5">Nhân viên</th>
                                            <th class="h5">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $k=1?>
                                        @foreach($listBookings as $index => $item)
                                            @if($item->status_booking==0)
                                                <tr>
                                                    <td>
                                                        {{$k++}}
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @foreach ($listUsers as $user)
                                                                    <?php if($item->user_id==$user->id){
                                                                    echo $user->name;
                                                                }?>
                                                            @endforeach
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div  style="width: 100px">
                                                            <h6>{{$item->checkin_date}}</h6>
                                                            <span class="fs-14">08:29 AM</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div  style="width: 100px">
                                                            <h6>{{$item->checkout_date}}</h6>
                                                            <span class="fs-14">08:29 AM</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p>{{$item->people}}</p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            @foreach ($listCaterooms as $cate)
                                                                    <?php if($item->cate_room_id==$cate->id){
                                                                    echo $cate->name;
                                                                }?>
                                                            @endforeach
                                                        </p>
                                                    </td>
                                                    <td><div style="width: 150px"><?= $item->status_pay==0?'<p class="text-danger">Chưa thanh toán</p>':'<p class="text-success">Đã thanh toán</p>'?></div></td>
                                                    <td><p style="width: 150px">
                                                            @if($item->staff_id==1)
                                                                {{'Nguyễn Đình Huân'}}
                                                            @elseif($item->staff_id==2)
                                                                {{'Nguyễn Văn Linh'}}
                                                            @else
                                                                {{'Đinh Trung Nguyên'}}
                                                            @endif
                                                        </p></td>
                                                    <td style="display: flex">
                                                        <a href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}" style="width: 100px"><button class="btn btn-success">Chi tiết</button></a>
                                                        <a href="{{url(('/bookings/'.$item->id))}}" style="margin-left: 10px"><button class="btn btn-primary">Sửa</button></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
