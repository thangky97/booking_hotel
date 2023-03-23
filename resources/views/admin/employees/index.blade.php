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
							<div class="card-tabs mt-3 mt-sm-0">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Hoạt động</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Không hoạt động</a>
									</li>
								</ul>
							</div>
                            <div>
                                <a href="" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
                                <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                            </div>
                        </div>
						<div class="tab-content">
							<div class="tab-pane active show" id="All">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-lg" id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none h5 text-center">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th class="h5 text-center">Tên nhân viên</th>
												<th class="h5 text-center">Chức vụ</th>
												<th class="h5 text-center">Mô tả công việc</th>
												<th class="h5 text-center">Giờ làm việc</th>
												<th class="h5 text-center">Liên hệ</th>
												<th class="h5 text-center">Trạng thái</th>
												<th class="bg-none h5 text-center"></th>
											</tr>
										</thead>
										<tbody>
                                                @foreach($listEmployees as $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div class="form-check style-1">
                                                              <input class="form-check-input" type="checkbox">
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="concierge-bx">
                                                                <img class="me-3 rounded" src="{{asset("storage/".$item->avatar)}}" alt="">
                                                                <div>
                                                                    <span class="text-primary">#{{$item->id}}</span>
                                                                    <h4 class="mt-1"><a class="text-black" href="guest-detail.html">{{$item->name}}</a></h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $item->role==1?'Quản lý khách sạn':'Nhân viên khách sạn'?>
                                                        </td>
                                                        <td class="job-desk">
                                                            <div>
                                                                @if($item->role==1)
                                                                    <span class="fs-16">
                                                                        Giám sát các bộ phận từ lễ tân, nhân viên bếp, nhân viên dọn phòng đến các nhân viên hành chính văn phòng.<span id="dots1">...</span><span id="more1"> Kiểm tra đánh giá thường xuyên hiệu suất làm việc của nhân viên để đưa ra phương án cải tiến dịch vụ khách hàng cho khách sạn.</span>
                                                                        <button onclick="myFunction1()" id="myBtn1" class="ct-bt">Xem thêm</button>
                                                                    </span>
                                                                @else
                                                                    <span class="fs-16">
                                                                        Xử lý các cuộc gọi đến phòng khách và gọi đi của khách. Bảo quản tiền và tư trang khi khách gửi. Nhận báo thức khách theo yêu cầu.<span id="dots2">...</span><span id="more2"> Phối hợp với các bộ phận liên quan thực hiện yêu cầu chuyển phòng cho khách.</span>
                                                                    <button onclick="myFunction2()" id="myBtn2" class="ct-bt">Xem thêm</button>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div>
                                                                <h5 class="font-w600">Tuesday, Friday, Sunday</h5>
                                                                <span>08:00 AM - 04:00 PM</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="text-nowrap">
                                                                <span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>{{$item->phone}}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $item->status==0?'<p class="text-danger">Không hoạt động</p>':'<p class="text-success">Đang hoạt động</p>'?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="dropdown dropstart">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
            </div>
        </div>
