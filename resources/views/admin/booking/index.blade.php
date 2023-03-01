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
										<a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Chưa giải quyết</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Đặt trước</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Canceled" role="tab">Đã hủy</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Refund" role="tab">Đền bù</a>
									</li>
								</ul>
							</div>
							<div class="table-search">
								<div class="input-group search-area mb-xxl-0 mb-4">
									<input type="text" class="form-control" placeholder="Tìm kiếm ">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
							<a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4 "><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
						</div>
						<div class="tab-content">	
							<div class="tab-pane active show" id="All">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Khách hàng</th>
												<th>Ngày đặt phòng</th>
												<th>Ngày nhận phòng</th>
												<th>Ngày trả phòng</th>
												<th>Yêu cầu</th>
												<th>Loại phòng</th>
												<th>Thanh toán</th>
												<th>Trạng thái</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Yonna</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-danger">Refund</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Xác nhận</a>
															<a class="dropdown-item" href="javascript:void(0);">Chờ giải quyết</a>
															<a class="dropdown-item" href="javascript:void(0);">Đã cọc</a>
															<a class="dropdown-item" href="javascript:void(0);">Trả cọc</a>
															<a class="dropdown-item" href="javascript:void(0);">Hủy</a>
															
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/2.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Mr. John Kipli</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-dark">Canceled</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/3.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Roberto Cr.</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/4.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Tonni Sblak</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/5.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Keanu Repes</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-warning">Pending</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/6.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Monalisa</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/4.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Tonni Sblak</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/5.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Keanu Repes</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-warning">Pending</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/6.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Monalisa</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/4.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Tonni Sblak</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/5.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Keanu Repes</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-warning">Pending</span></td>
												<td>
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
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/6.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Monalisa</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link disabled">No Request</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td>119$</td>
												<td><span class="text-success">Booked</span></td>
												<td>
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
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="Pending">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Guest</th>
												<th>Date Order</th>
												<th>Check In</th>
												<th>Check Out</th>
												<th>Special Request</th>
												<th>Room Type</th>
												<th>Status</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Yonna</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td><span class="text-danger">Refund</span></td>
												<td>
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
										</tbody>
									</table>	
								</div>
							</div>
							<div class="tab-pane fade" id="Canceled">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Guest</th>
												<th>Date Order</th>
												<th>Check In</th>
												<th>Check Out</th>
												<th>Special Request</th>
												<th>Room Type</th>
												<th>Status</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Yonna</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td><span class="text-danger">Refund</span></td>
												<td>
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
										</tbody>
									</table>	
								</div>
							</div>
							<div class="tab-pane fade" id="Refund">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Guest</th>
												<th>Date Order</th>
												<th>Check In</th>
												<th>Check Out</th>
												<th>Special Request</th>
												<th>Room Type</th>
												<th>Status</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Yonna</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td><span class="text-danger">Refund</span></td>
												<td>
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
										</tbody>
									</table>	
								</div>
							</div>
							<div class="tab-pane fade" id="Booked">
								<div class="table-responsive">
									<table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Guest</th>
												<th>Date Order</th>
												<th>Check In</th>
												<th>Check Out</th>
												<th>Special Request</th>
												<th>Room Type</th>
												<th>Status</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="media-bx">
														<img class="me-3 rounded" src="images/avatar/1.jpg" alt="">
														<div>
															<span class="text-primary">#GS-2234</span>
															<h4 class="mb-0 mt-1"><a class="text-black" href="guest-detail.html">Yonna</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<h5>Sunday, Oct 24th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 29th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td>
													<div>
														<h5>Oct 31th, 2020</h5>
														<span class="fs-14">08:29 AM</span>
													</div>
												</td>
												<td><a href="javascript:void(0);" class="btn-link">View Notes</a></td>
												<td>
													<div>
														<h5>Queen A-2345</h5>
														<span class="fs-14">Room No. 0024</span>
													</div>
												</td>
												<td><span class="text-danger">Refund</span></td>
												<td>
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
										</tbody>
									</table>	
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>