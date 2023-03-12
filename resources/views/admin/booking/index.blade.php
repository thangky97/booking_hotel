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
                            <div>
                                <a href="{{route('route_BackEnd_Bookings_Adduser')}}" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
                                <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                            </div>
						</div>
						<div class="tab-content">
							<div class="tab-pane active show" id="Active">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               id="checkAll">
                                                    </div>
                                                </th>
                                                <th class="h5 text-center">STT</th>
                                                <th class="h5 text-center">Khách hàng</th>
												<th class="h5 text-center">Ngày đặt</th>
												<th class="h5 text-center">Ngày trả</th>
												<th class="h5 text-center">Người</th>
												<th class="h5 text-center">Loại phòng</th>
												<th class="h5 text-center w180">Thanh toán</th>
												<th class="h5 text-center">Nhân viên</th>
												<th></th>
											</tr>
										</thead>
                                        <tbody>
                                        <?php $i=1?>
                                        @foreach($listBookings as $index => $item)
                                            @if($item->status_booking==1)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{$i++}}
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        @foreach ($listUsers as $user)
                                                            <?php if($item->user_id==$user->id){
                                                                echo $user->name;
                                                            }?>
                                                       @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkin_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkout_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$item->people}}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        @foreach ($listCaterooms as $cate)
                                                                <?php if($item->cate_room_id==$cate->id){
                                                                echo $cate->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{route('route_BackEnd_Bookings_Updatepay',$item->id)}}" method="post">
                                                        @csrf
                                                        @if($item->status_pay==0)
                                                            <input name="status_pay" value="1" hidden>
                                                            <button type="submit" class="btn btn-danger w180">Chưa thanh toán</button>
                                                        @else
                                                            <input name="status_pay" value="0" hidden>
                                                            <button type="submit" class="btn btn-success w180">Đã thanh toán</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td class="text-center"><p style="width: 150px">
                                                        @if($item->staff_id==1)
                                                            {{'Nguyễn Đình Huân'}}
                                                        @elseif($item->staff_id==2)
                                                            {{'Nguyễn Văn Linh'}}
                                                        @else
                                                            {{'Đinh Trung Nguyên'}}
                                                       @endif
                                                        </p></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropstart">
                                                        <a href="javascript:void(0);" class="btn-link"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>
                                                            <a class="dropdown-item" href="">Sửa</a>
                                                        </div>
                                                    </div>
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
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="checkAll">
                                                </div>
                                            </th>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Khách hàng</th>
                                            <th class="h5 text-center">Ngày đặt</th>
                                            <th class="h5 text-center">Ngày trả</th>
                                            <th class="h5 text-center">Người</th>
                                            <th class="h5 text-center">Loại phòng</th>
                                            <th class="h5 text-center">Thanh toán</th>
                                            <th class="h5 text-center">Nhân viên</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $j=1?>
                                        @foreach($listBookings as $index => $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{$j++}}
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        @foreach ($listUsers as $user)
                                                                <?php if($item->user_id==$user->id){
                                                                echo $user->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkin_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div  style="width: 100px">
                                                        <h6>{{$item->checkout_date}}</h6>
                                                        <span class="fs-14">08:29 AM</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <p>{{$item->people}}</p>
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        @foreach ($listCaterooms as $cate)
                                                                <?php if($item->cate_room_id==$cate->id){
                                                                echo $cate->name;
                                                            }?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                        <span class="fs-16">
                                                            <?= $item->status_pay==0?'<span class="badge light badge-success">Đã thanh toán</span>':'<span class="badge light badge-danger">Chưa thanh toán</span>'?>
														</span>
                                                </td>
                                                <td class="text-center"><p style="width: 150px">
                                                        @if($item->staff_id==1)
                                                            {{'Nguyễn Đình Huân'}}
                                                        @elseif($item->staff_id==2)
                                                            {{'Nguyễn Văn Linh'}}
                                                        @else
                                                            {{'Đinh Trung Nguyên'}}
                                                        @endif
                                                    </p></td>
                                                <td class="text-center">
                                                    <div class="dropdown dropstart">
                                                        <a href="javascript:void(0);" class="btn-link"
                                                           data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                    stroke="#262626" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>
                                                            <a class="dropdown-item" href="">Sửa</a>
                                                        </div>
                                                    </div>
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
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="checkAll">
                                                </div>
                                            </th>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Khách hàng</th>
                                            <th class="h5 text-center">Ngày đặt</th>
                                            <th class="h5 text-center">Ngày trả</th>
                                            <th class="h5 text-center">Người</th>
                                            <th class="h5 text-center">Loại phòng</th>
                                            <th class="h5 text-center">Thanh toán</th>
                                            <th class="h5 text-center">Nhân viên</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $k=1?>
                                        @foreach($listBookings as $index => $item)
                                            @if($item->status_booking==0)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="form-check style-1">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{$k++}}
                                                    </td>
                                                    <td class="text-center">
                                                        <p>
                                                            @foreach ($listUsers as $user)
                                                                    <?php if($item->user_id==$user->id){
                                                                    echo $user->name;
                                                                }?>
                                                            @endforeach
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <div  style="width: 100px">
                                                            <h6>{{$item->checkin_date}}</h6>
                                                            <span class="fs-14">08:29 AM</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div  style="width: 100px">
                                                            <h6>{{$item->checkout_date}}</h6>
                                                            <span class="fs-14">08:29 AM</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>{{$item->people}}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>
                                                            @foreach ($listCaterooms as $cate)
                                                                    <?php if($item->cate_room_id==$cate->id){
                                                                    echo $cate->name;
                                                                }?>
                                                            @endforeach
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="fs-16">
                                                            <?= $item->status_pay==0?'<span class="badge light badge-success">Đã thanh toán</span>':'<span class="badge light badge-warning">Chưa thanh toán</span>'?>
														</span>
                                                    </td>
                                                    <td class="text-center"><p style="width: 150px">
                                                            @if($item->staff_id==1)
                                                                {{'Nguyễn Đình Huân'}}
                                                            @elseif($item->staff_id==2)
                                                                {{'Nguyễn Văn Linh'}}
                                                            @else
                                                                {{'Đinh Trung Nguyên'}}
                                                            @endif
                                                        </p></td>
                                                    <td class="text-center">
                                                        <div class="dropdown dropstart">
                                                            <a href="javascript:void(0);" class="btn-link"
                                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                        stroke="#262626" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                        stroke="#262626" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path
                                                                        d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                        stroke="#262626" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>
                                                                <a class="dropdown-item" href="">Sửa</a>
                                                            </div>
                                                        </div>
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
